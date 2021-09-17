<?php
function getUrl(){
	return "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
}
?>
<!DOCTYPE html>
<!--XLXI SOAP CONSOLE-->
<!--WEED-->
<html style="height:100%;background-color:#1e1e1e">
<head>
<link data-name="vs/editor/editor.main" rel="stylesheet" href="<?=getUrl()?>/vendor/monaco/vs/editor/editor.main.css">
<style type="text/css">
body{
	margin: 0;
	padding: 0;
	border: 0;
	overflow: hidden;
}
</style>
</head>
<body style="height:100%">
<script>var require = { paths: { 'vs': '<?=getUrl()?>/vendor/monaco/vs' } };</script>
<script src="<?=getUrl()?>/vendor/monaco/vs/loader.js"></script>
<script src="<?=getUrl()?>/vendor/monaco/vs/editor/editor.main.nls.js"></script>
<script src="<?=getUrl()?>/vendor/monaco/vs/editor/editor.main.js"></script>
<div id="container" style="width:100%;height:100%;">
</div>
<script>
var editor = monaco.editor.create(document.getElementById("container"), {
	value: "print(\"Hello World!\")",
	language: "lua",
	lineNumbers: "on",
	roundedSelection: true,
	scrollBeyondLastLine: true,
	readOnly: false,
	theme: "vs-dark",
    tabCompletion: true,
});
</script>
<script>
function layout() {
	var WIDTH = window.innerWidth;
	var HEIGHT = window.innerHeight;

	if (editor) {
		editor.layout({
			width: WIDTH,
			height: HEIGHT
		});
	}
}
window.onresize = layout;
</script>
</body>
</html>