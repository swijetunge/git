app.directive('percentage', function($filter) { 
  return { 
    require: 'ngModel',
    link: function(scope, ele, attr, ctrl){
        ctrl.$parsers.unshift(
            function(viewValue){
                return $filter('number')(parseFloat(viewValue)/100, 4);
            }
        );
        ctrl.$formatters.unshift(
            function(modelValue){
                return $filter('number')(parseFloat(modelValue)*100, 2) + '%';
            }
        );
      }
  }; 
});
