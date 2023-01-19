
$scope.MODO_DEVELOP = false;
$scope.$evalAsync();
$scope.urlGWDEVELOP = "http://localhost:8002/";
$scope.urlGWQA = "https://apm.dev.coderio.co/documents/api/";

if ($scope.MODO_DEVELOP)
{
      console.log("MODO DEVELOP");
      $scope.urlGW = $scope.urlGWDEVELOP;
}
else
{
      console.log("MODO QA");
      $scope.urlGW = $scope.urlGWQA;
}


