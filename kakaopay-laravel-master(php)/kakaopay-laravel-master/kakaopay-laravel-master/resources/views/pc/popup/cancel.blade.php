<!DOCTYPE html>
<html xmlns:layout="http://www.ultraq.net.nz/web/thymeleaf/layout" xmlns:th="http://www.thymeleaf.org/">
<head>
    <title>Kakaopay Sample</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
</head>
<body>
<h1>결제가 취소되었습니다.(canceled payment)</h1>
<a href="javascript:closePopup();">close</a>
</body>
<script>
    function closePopup() {
        window.opener.location.href = "/";
        self.close();
    }
</script>
</html>
