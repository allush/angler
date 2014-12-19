<?php
/* @var $this ProfileController */
/* @var $model Photo */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Загрузить фото';
$this->breadcrumbs = array(
    'Мои фото' => array('myphoto'),
    'Загрузить фото'
);
?>
<?php $this->renderPartial('_menu'); ?>



<div id="filelist">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>
<br/>

<div id="container">
    <a id="pickfiles" href="javascript:;">[Выбор файлов]</a>
    <a id="uploadfiles" href="javascript:;">[Загрузить]</a>
</div>

<br/>
<pre id="console"></pre>


<script type="text/javascript">
    // Custom example logic

    var uploader = new plupload.Uploader({
        runtimes: 'html5,flash,silverlight,html4',

        browse_button: 'pickfiles', // you can pass in id...
        container: document.getElementById('container'), // ... or DOM Element itself

        url: "<?= $this->createUrl('/profile/uploadPhoto');?>",

        filters: {
            max_file_size: '10mb',
            mime_types: [
                {title: "Image files", extensions: "jpg,gif,png"}
            ]
        },

        // Flash settings
        flash_swf_url: '/plupload/js/Moxie.swf',

        // Silverlight settings
        silverlight_xap_url: '/plupload/js/Moxie.xap',


        init: {
            PostInit: function () {
                document.getElementById('filelist').innerHTML = '';

                document.getElementById('uploadfiles').onclick = function () {
                    uploader.start();
                    return false;
                };
            },

            FilesAdded: function (up, files) {
                plupload.each(files, function (file) {
                    document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                });
            },


            UploadComplete: function () {
                location.href = 'http://angler/index.php?r=profile/myphoto';
            },

            UploadProgress: function (up, file) {
                document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
            },

            Error: function (up, err) {
                document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
            }
        }
    });

    uploader.init();

</script>



<?php //$this->renderPartial('_form' ,array('model' =>$model)); ?>


