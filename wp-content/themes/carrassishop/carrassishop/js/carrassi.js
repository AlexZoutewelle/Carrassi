
document.addEventListener('DOMContentLoaded', function(e){
    jQuery('.contact_form form').submit(function(e){
        e.preventDefault();

        jQuery('.contact_form form button .button_text').hide();
        jQuery('.contact_form form button .spinner').show();

        let form_data = {};
        jQuery('.contact_form form').serializeArray().map(function(item) {
            if ( form_data[item.name] ) {
                if ( typeof(form_data[item.name]) === "string" ) {
                    form_data[item.name] = [form_data[item.name]];
                }
                form_data[item.name].push(item.value);
            } else {
                form_data[item.name] = item.value;
            }
        });

        let data = {
            'action' : 'contact_form',
            'form' : form_data
        }

        jQuery.ajax({
            url: carrassi_config.ajax_url,
            type: 'POST',
            dataType:'json',
            cache: false,
            data: data,
            success: function(response) {
                jQuery('.contact_form form button .button_text').show();
                jQuery('.contact_form form button .spinner').hide();

                alert(response.data.message);


            },
            error: function(reponse) {
                alert(response.data.message);
            }
        });

    });

    setShareLinks();

    function open_social_sharing_window(url) {
        var left = (screen.width - 570) / 2;
        var top = (screen.height - 570) / 2;
        var params = "menubar=no,toolbar=no,status=no,width=570,height=570,top=" + top + ",left=" + left;
        window.open(url,"NewWindow",params);
    }

    function setShareLinks() {
        var page_url = encodeURIComponent(document.URL);

        jQuery(".share_this_post .fa-facebook").on("click", function() {
            url = "https://www.facebook.com/sharer.php?u=" + page_url;
            open_social_sharing_window(url);
        });

        jQuery(".share_this_post .fa-twitter").on("click", function() {
            url = "https://twitter.com/intent/tweet?url=" + page_url + "&text=" + jQuery(".entry-title").text();
            open_social_sharing_window(url);
        });

        jQuery(".share_this_post .fa-linkedin").on("click", function() {
            url = "https://www.linkedin.com/shareArticle?mini=true&url=" + page_url;
            open_social_sharing_window(url);
        })
    }

    jQuery('.comment-list').on('click', function(e){

        if(e.target.classList.contains('comment-reply-link')) {
            e.preventDefault();
            console.log("clicked");
            let comment = e.target.closest('.comment-main-wrap');
            let respond_form = document.querySelector('#respond');

            let comment_parent = respond_form.querySelector('#comment_parent');
            if(comment_parent === null) {
                comment_parent = document.createElement('input');
                comment_parent.type = 'hidden';
                comment_parent.id = 'comment_parent';
                respond_form.appendChild(comment_parent);
            }
            comment_parent.value = comment.id;

            respond_form.querySelector('#reply-title').innerHTML = 'Reply to ' + comment.querySelector('.comment-author-meta strong').innerText;

            comment.appendChild(respond_form);
        }
    })

    jQuery('.main-post #commentform').submit(function(e){
        e.preventDefault();
        let parent_comment = e.target.closest('.comment');
        let form_data = {};
        jQuery('#commentform').serializeArray().map(function(item) {
            if ( form_data[item.name] ) {
                if ( typeof(form_data[item.name]) === "string" ) {
                    form_data[item.name] = [form_data[item.name]];
                }
                form_data[item.name].push(item.value);
            } else {
                form_data[item.name] = item.value;
            }
        });

        let data = {
            'action' : 'carrassi_post_comment',
            'form' : form_data,
            'even' : parent_comment.classList.contains('even')
        }
        // statusdiv.html('<p>Processing...</p>');

        jQuery.ajax({
            url: carrassi_config.ajax_url,
            type: 'POST',
            dataType:'json',
            cache: false,
            data: data,
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
                // statusdiv.html('<p class="ajax-error" >You might have left one of the fields blank, or be posting too quickly</p>');
            },
            success: function(response){
                if(parent_comment.querySelector('ul.children') === null) {
                    let children = document.createElement('ul');
                    children.classList.add('children');
                    parent_comment.appendChild(children);
                }

                let children = jQuery(parent_comment).find('ul.children');
                children.append(response.data.comments_html);

                let respond_element = document.querySelector('#respond');
                respond_element.querySelector('#comment_parent').remove();
                respond_element.querySelector('#reply-title').innerHTML = 'Reply to ' + document.querySelector('.author-name a').innerText;

                document.querySelector('#comment_form_spot').appendChild(document.querySelector('#respond'));
                // if(data == "success" || textStatus == "success"){
                //     statusdiv.html('<p class="ajax-success" >Thanks for your comment. We appreciate your response.</p>');
                // }else{
                //     statusdiv.html('<p class="ajax-error" >Please wait a while before posting your next comment</p>');
                //     commentform.find('textarea[name=comment]').val('');
                // }
            }
        });
    })

    jQuery(".journal_wrap").click(function(e) {
        e.target.closest('.journal_wrap').querySelector('.article_readon a').click();
    });

    jQuery(".plugin").click(function(e){
        e.target.closest(".plugin").querySelector("button").click();
    })

    let usps = jQuery('#key_features .usp');
    for(var i = 0; i < usps.length; i++) {
        console.log(usps[i]);
    }

    let btn_toTop = jQuery('.btn-toTop');
    if(btn_toTop.length) {

        window.onscroll = function() {update_toTopButton()};

        function update_toTopButton() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                btn_toTop.addClass("active");
            } else {
                btn_toTop.removeClass("active");
            }
        }

        btn_toTop.on('click', function(e) {
            jQuery('html, body').stop().animate({
                scrollTop: '0px'
            }, 500)
        });


    }

});

