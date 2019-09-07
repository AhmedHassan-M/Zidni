

$(document).ready(function() {


    const setActivePage = () => {

        const url = window.location.pathname
  
        console.log(url);
  
        let urlRegExp = new RegExp(url.replace(/\/$/, '') + "$"); 
        $('.wsmenu .navtext').each(function () {
          if (urlRegExp.test(this.href.replace(/\/$/, ''))) {
              $(this).parent().addClass('active');
          }
        });


        $('.account-link .navtext').each(function () {
            if (urlRegExp.test(this.href.replace(/\/$/, ''))) {
                $(this).parent().parent().parent().parent().addClass('active');
            }
          });
  
      }



      $('.rating_1 input').change(function () {
        var $radio = $(this);
        $('.rating_1 .selected').removeClass('selected');
        $radio.closest('label').addClass('selected');
      });
      
      $('.rating_2 input').change(function () {
        var $radio = $(this);
        $('.rating_2 .selected').removeClass('selected');
        $radio.closest('label').addClass('selected');
      });
      
  
      setActivePage();


    });



    $('.dropify').dropify({




      messages: {
          'default': 'Drag and drop the document here or click',
          'replace': 'Drag and drop or click to replace the document',
          'remove':  'Remove',
          'error':   'Ooops, something wrong happended.',          
      },
      tpl: {
          wrap:            '<div class="dropify-wrapper"></div>',
          loader:          '<div class="dropify-loader"></div>',
          message:         '<div class="dropify-message"><span class="file-icon" /> <p>{{ default }}</p></div>',
          preview:         '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p><p class="dropify-infos-message"></p></div></div></div>',
          filename:        '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
          clearButton:     '<button type="button" class="dropify-clear">{{ remove }}</button>',
          errorLine:       '<p class="dropify-error">{{ error }}</p>',
          errorsContainer: '<div class="dropify-errors-container"><ul></ul></div>'
      },
      error: {
          'fileSize': 'The file size is too big ( {{ value }} max ).',
          'minWidth': 'The image width is too small ( {{ value }} px min ).',
          'maxWidth': 'The image width is too big ( {{ value }} px max ).',
          'minHeight': 'The image height is too small ( {{ value }} px min ).',
          'maxHeight': 'The image height is too big ( {{ value }}px max ).',
          'imageFormat': 'The image format is not allowed ( {{ value }} only ).'
      }
      

      

      
      
});