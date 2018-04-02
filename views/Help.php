<?php require 'HeaderFooter/Header.php'; ?>
<!--<body>-->

<?php
if (!empty($this->msg)) {
    echo $this->msg;
} else {
    echo 'no message avilable';
}
?>;
<button onclick="myFunction()">Try it</button>
<script type="text/javascript">
    
    
    
    function myFunction() {
    alert("<?php echo $this->msg ?>");
}
</script>


<!--</body>-->
<?php require 'HeaderFooter/Footer.php'; ?>
