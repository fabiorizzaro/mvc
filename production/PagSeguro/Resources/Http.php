<?php
/**
 * 2007-2016 [PagSeguro Internet Ltda.]
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @author    PagSeguro Internet Ltda.
 * @copyright 2007-2016 PagSeguro Internet Ltda.
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 *
 */

namespace PagSeguro\Resources;

use PagSeguro\Library;

/**
 * Class Http
 * @package PagSeguro\Resources
 */
class Http
{
    /**
     * @var
     */
    private $status;
    /**
     * @var
     */
    private $response;

    /**
     * Http constructor.
     */
    public function __construct()
    {
        if (!function_exists('curl_init')) {
            throw new \Exception('PagSeguro Library: cURL library is required.');
        }
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }

    /**
     * @param $url
     * @param array $data
     * @param int $timeout
     * @param string $charset
     * @return bool
     * @throws \Exception
     */
    public function post($url, array $data = array(), $timeout = 20, $charset = 'ISO-8859-1')
    {
        return $this->curlConnection('POST', $url, $timeout, $charset, $data);
    }

    /**
     * @param $url
     * @param int $timeout
     * @param string $charset
     * @return bool
     * @throws \Exception
     */
    public function get($url, $timeout = 20, $charset = 'ISO-8859-1')
    {
        return $this->curlConnection('GET', $url, $timeout, $charset, null);
    }

    /**
     * @param $method
     * @param $url
     * @param $timeout
     * @param $charset
     * @param array|null $data
     * @return bool
     * @throws \Exception
     */
    private function curlConnection($method, $url, $timeout, $charset, array $data = null)
    {
        if (strtoupper($method) === 'POST') {
            $postFields = ($data ? http_build_query($data, '', '&') : "");
            $contentLength = "Content-length: " . strlen($postFields);
            $methodOptions = array(
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $postFields,
            );
        } else {
            $contentLength = null;
            $methodOptions = array(
                CURLOPT_HTTPGET => true
            );
        }

        $options = array(
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/x-www-form-urlencoded; charset=" . $charset,
                $contentLength,
                'lib-description: php:' . Library::libraryVersion(),
                'language-engine-description: php:' . Library::phpVersion()
            ),
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_CONNECTTIMEOUT => $timeout,
            //CURLOPT_TIMEOUT => $timeout
        );

        if (!is_null(Library::moduleVersion()->getRelease())) {
            array_push(
                $options[CURLOPT_HTTPHEADER],
                sprintf('module-description: %s', Library::moduleVersion()->getName())
            );
            array_push(
                $options[CURLOPT_HTTPHEADER],
                sprintf('module-version: %s', Library::moduleVersion()->getRelease())
            );
        }
        
        if (!is_null(Library::cmsVersion()->getRelease())) {
            array_push(
                $options[CURLOPT_HTTPHEADER],
                sprintf('cms-description: %s :%s', Library::cmsVersion()->getName(), Library::cmsVersion()->getRelease())
            );
        }

        $options = ($options + $methodOptions);
        $curl = curl_init();
        curl_setopt_array($curl, $options);
        $resp = curl_exec($curl);
        $info = curl_getinfo($curl);
        $error = curl_errno($curl);
        $errorMessage = curl_error($curl);
        curl_close($curl);
        $this->setStatus((int) $info['http_code']);
        $this->setResponse((String) $resp);
        if ($error) {
            throw new \Exception("CURL can't connect: $errorMessage");
        } else {
            return true;
        }
    }
}
