jQuery(document).ready(function() {
   jQuery(".materialize-slider").revolution({
        sliderType:"standard",
        sliderLayout:"fullwidth",
        delay:9000,
        navigation: {
            keyboardNavigation: "on",
            keyboard_direction: "horizontal",
            mouseScrollNavigation: "off",
            onHoverStop: "off",
            touch: {
                touchenabled: "on",
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: "horizontal",
                drag_block_vertical: false
            },
            arrows: {
                style: "gyges",
                enable: true,
                hide_onmobile: false,
                hide_onleave: true,
                tmp: '',
                left: {
                    h_align: "left",
                    v_align: "center",
                    h_offset: 10,
                    v_offset: 0
                },
                right: {
                    h_align: "right",
                    v_align: "center",
                    h_offset: 10,
                    v_offset: 0
                }
            }
        },
        responsiveLevels:[1240,1024,778,480],
        gridwidth:[1140,1024,778,480],
        gridheight:[700,600,800,800],
        disableProgressBar:"on",
        parallax: {
            type:"mouse",
            origo:"slidercenter",
            speed:2000,
            levels:[2,3,4,5,6,7,12,16,10,50],
        }


    });
});
// 
new WOW({
            mobile:  true
        }).init();

 $('.toggle').on('click', function() {
              $('.login-wrapper').stop().addClass('active');
            });

            $('.close').on('click', function() {
              $('.login-wrapper').stop().removeClass('active');
            });
