<!DOCTYPE html>
<html ng-app="app">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Teresa</title>
     <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="node_modules/ngprogress/ngProgress.css">
    <!-- jQuery -->
    <script src="js/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <!-- angular -->
    <script type="text/javascript" src="/angular/angular.min.js"></script>
    <script type="text/javascript" src="/angular/sanitize.js"></script>
    <!-- dir paginate -->
    <script type="text/javascript" src="/angular-utils-pagination/dirPagination.js"></script>
    <!-- ng-route -->
    <script type="text/javascript" src="/angular-route/angular-route.js"></script>
    <!-- ngProgress -->
    <script type="text/javascript" src="/ngprogress/build/ngProgress.js"></script>

    <script type="text/javascript" src="/tinymce/tinymce.js"></script>
    <script type="text/javascript" src="/angular-ui-tinymce/src/tinymce.js"></script>

    <!-- App -->
    <script type="text/javascript" src="js/app.js"></script>

    <!-- Services -->
    <script type="text/javascript" src="app/services/loginService.js"></script>
    <script type="text/javascript" src="app/services/loginAdminService.js"></script>
    <script type="text/javascript" src="app/services/questoesService.js"></script>
    <script type="text/javascript" src="app/services/testeService.js"></script>
    <script type="text/javascript" src="app/services/partidasService.js"></script>
    <script type="text/javascript" src="app/services/partidaQuestaoService.js"></script>
    <script type="text/javascript" src="app/services/participanteService.js"></script>
    <script type="text/javascript" src="app/services/timeService.js"></script>


    <!-- Controllers -->
    <script type="text/javascript" src="app/controllers/loginController.js"></script>
    <script type="text/javascript" src="app/controllers/loginAdminController.js"></script>
    <script type="text/javascript" src="app/controllers/adminController.js"></script>
    <script type="text/javascript" src="app/controllers/questoesController.js"></script>
    <script type="text/javascript" src="app/controllers/partidasController.js"></script>
    <script type="text/javascript" src="app/controllers/iniciarController.js"></script>
    <script type="text/javascript" src="app/controllers/partidaController.js"></script>
</head>
<body>
    <ng-view></ng-view>
</body>
</html>