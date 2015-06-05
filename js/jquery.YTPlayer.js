    jQuery(function () {

        

        var myPlayer = jQuery("#bgndVideo").YTPlayer({
            onReady: function (player) {
                YTPConsole.append(player.id + " player is ready");
                YTPConsole.append("<br>");
            }
        });

        myPlayer.on("YTPData", function (e) {
            $(".dida").html(e.prop.title + "<br>@" + e.prop.channelTitle);
            $("#videoData").show();
        });

        /* DEBUG ******************************************************************************************/

        var YTPConsole = jQuery("#eventListener");
        // EVENT: YTPStart YTPEnd YTPLoop YTPPause YTPBuffering
        myPlayer.on("YTPStart YTPEnd YTPLoop YTPPause YTPBuffering YTPMuted YTPUnmuted", function (e) {
            YTPConsole.append("event: " + e.type + " (" + jQuery("#bgndVideo").YTPGetPlayer().getPlayerState() + ") > time: " + e.time);
            YTPConsole.append("<br>");
        });
        // EVENT: YTPChanged
        myPlayer.on("YTPChanged", function (e) {
            YTPConsole.html("");
        });

        // EVENT: YTPData
        myPlayer.on("YTPData", function (e) {
            YTPConsole.append("******************************");
            YTPConsole.append("<br>");
            YTPConsole.append(e.type);
            YTPConsole.append("<br>");
            YTPConsole.append(e.prop.title);
            YTPConsole.append("<br>");
            YTPConsole.append(e.prop.description.replace(/\n/g, "<br/>"));
            YTPConsole.append("<br>");
            YTPConsole.append("******************************");
            YTPConsole.append("<br>");
        });

        // EVENT: YTPTime
        myPlayer.on("YTPTime", function (e) {
            var currentTime = e.time;
            var traceLog = currentTime / 5 == Math.floor(currentTime / 5);

            if (traceLog && YTPConsole.is(":visible")) {
                YTPConsole.append(myPlayer.attr("id")+ " > " + e.type + " > actual time is: " + currentTime);
                YTPConsole.append("<br>");
            }
        });

        /* END DEBUG ******************************************************************************************/

        /* FILTER SLIDERS ******************************************************************************************/
        // create sliders for filters adjustment
        var $slider = $(".slider").simpleSlider({
            initialval: 0, //function (el) {return Math.random() * el.opt.scale},
            scale     : 100,
            callback  : function (el) {
                var filter = $(el).data("filter");
                myPlayer.YTPApplyFilter(filter, +(el.value).toFixed(0));

                $("span",el).html(filter + "       (" + (+(el.value).toFixed(0)) + ")");

                var applFilters = [];
                var desc = "$(selector).YTPApplyFilters({";

                for (var x=0; x < $(".slider").length; x++ ){
                    var slider = $(".slider").eq(x).get(0);
                    var $slaider = $(slider);

                    if(slider.value)
                        applFilters.push($slaider.data("filter") + ": " + (+(slider.value).toFixed(0)) );
                };

                for (var y in applFilters){
                    var comma = y < applFilters.length-1 ? "," : "<br>";
                    desc += "<br> &nbsp;&nbsp;&nbsp;" + applFilters[y] + comma;
                }

                desc += "})";

                $("#filterScript").html(desc);
            }
        });

        //update applied filters
        myPlayer.on("YTPFiltersApplied", function(){
            var filters = myPlayer.get(0).filters;
            for (var key in filters){
                $(".slider[data-filter="+key+"]").updateSliderVal(filters[key].value);
            }
        });

    });
    /* END FILTER SLIDERS ******************************************************************************************/

    /**
     *
     * @param state
     */
    function changeLabel(state){
        $("#togglePlay").html(state != 1 ? "pause" : "play");

        $("#togglePlay").removeClass(state != 1 ? "play" : "pause");
        $("#togglePlay").addClass(state != 1 ? "pause" : "play");
    }

    /**
     *
     * @param val
     * @returns {*|number}
     */
    function checkForVal(val){
        return val || 0;
    }