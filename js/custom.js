
/*=============================================================
    Authour URI: www.binarytheme.com
    License: Commons Attribution 3.0

    http://creativecommons.org/licenses/by/3.0/

    100% Free To use For Personal And Commercial Use.
    IN EXCHANGE JUST GIVE US CREDITS AND TELL YOUR FRIENDS ABOUT US
   
    ========================================================  */

(function ($) {
    "use strict";
    var mainApp = {
        scroll_fun: function () {

            /*====================================
             SCROLL SCRIPTS 
            ======================================*/
            $(function () {
                $('.move-me a').bind('click', function (event) { //just pass move-me in design and start scrolling
                    var $anchor = $(this);
                    $('html, body').stop().animate({
                        scrollTop: $($anchor.attr('href')).offset().top
                    }, 1000, 'easeInOutQuad');
                    event.preventDefault();
                });
            });

            

        },
        
        gallery_fun: function () {
            /*====================================
                 FOR IMAGE/GALLERY POPUP
            ======================================*/
            $("a.preview").prettyPhoto({
                social_tools: false
            });

            /*====================================
            FOR IMAGE/GALLERY FILTER
            ======================================*/

            // MixItUp plugin
            // http://mixitup.io

            $('#port-folio').mixitup({
                targetSelector: '.portfolio-item',
                filterSelector: '.filter',


            });
        },
        vedio_fun:function()
        {
            $(function () {
                $(".player").mb_YTPlayer();
            });
        },

        nice_scroll_fun:function()
        {
            $("html").niceScroll();
        },
        custom_fun:function()
        {
            /*====================================
             WRITE YOUR   SCRIPTS  BELOW
            ======================================*/




        },

    }
   
   
    $(document).ready(function () {
        mainApp.scroll_fun();
        mainApp.gallery_fun();
        mainApp.vedio_fun();
        mainApp.nice_scroll_fun();
        mainApp.custom_fun();

    });
}(jQuery));

module = angular.module('app', []);


module.directive('showErrors', function($timeout) {

    return {

      restrict: 'A',

      require: '^form',

      link: function (scope, el, attrs, formCtrl) {

        // find the text box element, which has the 'name' attribute

        var inputEl   = el[0].querySelector("[name]");

        // convert the native text box element to an angular element

        var inputNgEl = angular.element(inputEl);

        // get the name on the text box

        var inputName = inputNgEl.attr('name');

        

        // only apply the has-error class after the user leaves the text box

        var blurred = false;

        inputNgEl.bind('blur', function() {

          blurred = true;

          el.toggleClass('has-error', formCtrl[inputName].$invalid);

        });

        

        scope.$watch(function() {

          return formCtrl[inputName].$invalid

        }, function(invalid) {

          // we only want to toggle the has-error class after the blur

          // event or if the control becomes valid

          if (!blurred && invalid) { return }

          el.toggleClass('has-error', invalid);

        });

        

        scope.$on('show-errors-check-validity', function() {

          el.toggleClass('has-error', formCtrl[inputName].$invalid);

        });

        

        scope.$on('show-errors-reset', function() {

          $timeout(function() {

            el.removeClass('has-error');

          }, 0, false);

        });

      }

    }

  });


module.controller('NewUserController', function($scope) {

  $scope.save = function() {

    $scope.$broadcast('show-errors-check-validity');

    

    if ($scope.userForm.$valid) {

      alert('User saved');

      $scope.reset();

    }

  };

  

  $scope.reset = function() {

    $scope.$broadcast('show-errors-reset');

    $scope.user = { name: '', email: '' };

  }

});


