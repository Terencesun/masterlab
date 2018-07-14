<!DOCTYPE html>
<html class="" lang="en">
<head  >

    <? require_once VIEW_PATH.'gitlab/common/header/include.php';?>
    <script src="<?=ROOT_URL?>dev/js/jquery.form.js"></script>

    <!-- Fine Uploader jQuery JS file-->
    <link href="<?=ROOT_URL?>dev/lib/fine-uploader/fine-uploader.css" rel="stylesheet">
    <link href="<?=ROOT_URL?>dev/lib/fine-uploader/fine-uploader-gallery.css" rel="stylesheet">
    <script src="<?=ROOT_URL?>dev/lib/fine-uploader/jquery.fine-uploader.js"></script>

</head>
<body class="" data-group="" data-page="projects:issues:index" data-project="xphp">
<? require_once VIEW_PATH.'gitlab/common/body/script.php';?>
<header class="navbar navbar-gitlab with-horizontal-nav">
    <a class="sr-only gl-accessibility" href="#content-body" tabindex="1">Skip to content</a>
    <div class="container-fluid">
        <? require_once VIEW_PATH.'gitlab/common/body/header-content.php';?>
    </div>
</header>
<script>
    var findFileURL = "/ismond/xphp/find_file/master";
</script>
<div class="page-with-sidebar">
    <? require_once VIEW_PATH.'gitlab/project/common-page-nav-project.php';?>
    <? require_once VIEW_PATH.'gitlab/project/common-setting-nav-links-sub-nav.php';?>

    <div class="content-wrapper page-with-layout-nav page-with-sub-nav">
        <div class="alert-wrapper">

            <div class="flash-container flash-container-page">
            </div>

        </div>
        <div class="container-fluid ">
            <div class="content" id="content-body">


                <div class="row prepend-top-default">
                    <div class="col-lg-3 settings-sidebar">
                        <h4 class="prepend-top-0">
                            基本信息
                        </h4>
                        <p>
                        </p>
                    </div>
                    <div class="col-lg-9">
                        <form class="new_project" id="new_project" action="<?=$project_root_url?>/settings_profile" accept-charset="UTF-8" method="post">
                            <input name="utf8" type="hidden" value="✓">
                            <input type="hidden" name="authenticity_token" value="">

                            <div class="form-group ">
                                <label class="label-light" for="project_namespace_id">
                                    <span>项目名称</span>
                                </label>
                                <input value="<?= $info['name']?>" placeholder="请输入名称,最多64字符" class="form-control" tabindex="1" autofocus="autofocus"
                                       required="required" type="text" name="params[name]" id="project_name" disabled>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-12 col-sm-6">
                                    <label class="label-light" for="project_namespace_id">
                                        <span>Project path</span>
                                    </label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                http://192.168.3.213/
                                            </div>
                                            <div class="select2-container select2 js-select-namespace" id="s2id_project_namespace_id" style="width: 85px;">
                                                <a href="javascript:void(0)" class="select2-choice" tabindex="-1">
                                                    <span class="select2-chosen" id="select2-chosen-1">sven</span>
                                                    <abbr class="select2-search-choice-close"></abbr>
                                                    <span class="select2-arrow" role="presentation">
                                                                    <b role="presentation"></b>
                                                                </span>
                                                </a>
                                                <label for="s2id_autogen1" class="select2-offscreen">
                                                    Project path
                                                    项目名称
                                                </label>
                                                <input class="select2-focusser select2-offscreen" type="text" aria-haspopup="true"
                                                       role="button" aria-labelledby="select2-chosen-1" id="s2id_autogen1" tabindex="1">
                                            </div>
                                            <select class="select2 js-select-namespace" tabindex="-1" name="project[namespace_id]" id="project_namespace_id"
                                                    title="Project path Project name" style="display: none;">
                                                <optgroup label="Groups"><option data-options-parent="groups" value="9">ismond</option></optgroup>
                                                <optgroup label="Users"><option data-options-parent="users" selected="selected" value="18">sven</option></optgroup>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 project-path">
                                    <label class="label-light" for="project_namespace_id">
                                        <span>项目Key</span>
                                    </label>
                                    <input value="<?= $info['key']?>" placeholder="必须英文字符,最大长度20" class="form-control" tabindex="3"
                                           required="required" type="text" name="params[key]" id="project_key" disabled>
                                </div>
                            </div>
                            <div class="project-import js-toggle-container">
                                <div class="form-group clearfix">
                                    <label class="label-light" for="project_visibility_level">
                                        项目类型
                                    </label>
                                    <div class="col-sm-12">


                                        <?php foreach ($full_type as $type_id => $type_item) { ?>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="params[type]" value="<?=$type_id?>" <?php if($type_id==$info['type']){echo 'checked';}?> >
                                                    <i class="<?=$type_item['type_face']?>"></i> <?=$type_item['type_name']?>
                                                </label>
                                            </div>
                                        <?php } ?>


                                    </div>
                                </div>
                                <div class="js-toggle-content hide">
                                    <div class="form-group import-url-data">
                                        <label class="control-label" for="project_import_url"><span>Git repository URL</span>
                                        </label><div class="col-sm-10">
                                            <input autocomplete="off" class="form-control" placeholder="https://username:password@gitlab.company.com/group/project.git" disabled="disabled" type="text" name="project[import_url]" id="project_import_url">
                                            <div class="well prepend-top-20">
                                                <ul>
                                                    <li>
                                                        The repository must be accessible over <code>http://</code>, <code>https://</code> or <code>git://</code>.
                                                    </li>
                                                    <li>
                                                        If your HTTP repository is not publicly accessible, add authentication information to the URL: <code>https://username:password@gitlab.company.com/group/project.git</code>.
                                                    </li>
                                                    <li>
                                                        The import will time out after 15 minutes. For repositories that take longer, use a clone/push combination.
                                                    </li>
                                                    <li>
                                                        To migrate an SVN repository, check out <a href="/help/workflow/importing/migrating_from_svn">this document</a>.
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="label-light" for="project_description">项目描述
                                    <span class="light">(optional)</span>
                                </label>
                                <textarea placeholder="Description format" class="form-control" rows="3" maxlength="250" name="params[description]" id="project_description">
                                    <?= $info['description']?>
                                </textarea>
                            </div>
                            <div class="form-group ">
                                <label class="label-light" for="project_lead">
                                    <span>项目负责人</span>
                                </label>
                                <select class="form-control" name="params[lead]" id="projectLead">
                                    <option>请选择</option>
                                    <?php foreach ($users as $user){ ?>
                                        <option <?php if($info['lead']==$user['uid']){echo "selected";}?>
                                                value="<?= $user['uid']?>">
                                            <?= $user['display_name']?>
                                        </option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group ">
                                <label class="label-light" for="project_url">
                                    <span>URL</span>
                                </label>
                                <input value="<?= $info['url']?>" placeholder="URL" class="form-control"  type="text" name="params[url]" id="project_url">
                            </div>

                            <div class="form-group">
                                <label class="label-light" for="project_avatar">
                                    <span>Avatar</span>
                                </label>
                                <a class="choose-btn btn js-choose-project-avatar-button">
                                    Browse file...
                                </a>
                                <span class="file_name prepend-left-default js-avatar-filename">No file chosen</span>
                                <input class="js-project-avatar-input hidden" type="file" name="params[avatar]" id="project_avatar">
                                <div class="help-block">The maximum file size allowed is 200KB.</div>
                            </div>

                            <input type="submit" name="commit" value="保存" class="btn btn-create project-submit" tabindex="4">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<!-- Fine Uploader Gallery template
   ====================================================================== -->
<script type="text/template" id="qq-template-gallery">
    <div class="qq-uploader-selector qq-uploader qq-gallery" qq-drop-area-text="Drop files here" >
        <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
            <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
        </div>
        <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
            <span class="qq-upload-drop-area-text-selector"></span>
        </div>
        <div class="qq-upload-button-selector qq-upload-button">
            <div>Upload a file</div>
        </div>
        <span class="qq-drop-processing-selector qq-drop-processing">
                <span>Processing dropped files...</span>
                <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
            </span>
        <ul class="qq-upload-list-selector qq-upload-list" role="region" aria-live="polite" aria-relevant="additions removals">
            <li>
                <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
                <div class="qq-progress-bar-container-selector qq-progress-bar-container">
                    <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
                </div>
                <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                <div class="qq-thumbnail-wrapper">
                    <img class="qq-thumbnail-selector" qq-max-size="120" qq-server-scale>
                </div>
                <button type="button" class="qq-upload-cancel-selector qq-upload-cancel">X</button>
                <button type="button" class="qq-upload-retry-selector qq-upload-retry">
                    <span class="qq-btn qq-retry-icon" aria-label="Retry"></span>
                    Retry
                </button>

                <div class="qq-file-info">
                    <div class="qq-file-name">
                        <span class="qq-upload-file-selector qq-upload-file"></span>
                        <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="Edit filename"></span>
                    </div>
                    <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                    <span class="qq-upload-size-selector qq-upload-size"></span>
                    <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">
                        <span class="qq-btn qq-delete-icon" aria-label="Delete"></span>
                    </button>
                    <button type="button" class="qq-btn qq-upload-pause-selector qq-upload-pause">
                        <span class="qq-btn qq-pause-icon" aria-label="Pause"></span>
                    </button>
                    <button type="button" class="qq-btn qq-upload-continue-selector qq-upload-continue">
                        <span class="qq-btn qq-continue-icon" aria-label="Continue"></span>
                    </button>
                </div>
            </li>
        </ul>

        <dialog class="qq-alert-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <div class="qq-dialog-buttons">
                <button type="button" class="qq-cancel-button-selector">Close</button>
            </div>
        </dialog>

        <dialog class="qq-confirm-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <div class="qq-dialog-buttons">
                <button type="button" class="qq-cancel-button-selector">No</button>
                <button type="button" class="qq-ok-button-selector">Yes</button>
            </div>
        </dialog>

        <dialog class="qq-prompt-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <input type="text">
            <div class="qq-dialog-buttons">
                <button type="button" class="qq-cancel-button-selector">Cancel</button>
                <button type="button" class="qq-ok-button-selector">Ok</button>
            </div>
        </dialog>
    </div>
</script>


<script>

    var options = {
        //target:        '#output2',   // target element(s) to be updated with server response
        beforeSubmit:  function (arr, $form, options) {

        },
        success:       function (data, textStatus, jqXHR, $form) {
            if(data.ret == 200){
                alert("保存成功");
            }else{
                alert("保存失败");
            }
            console.log(data);
        },

        // other available options:
        //url:       url         // override for form's 'action' attribute
        type:      "post",        // 'get' or 'post', override for form's 'method' attribute
        dataType:  "json",        // 'xml', 'script', or 'json' (expected server response type)
        //clearForm: true        // clear all form fields after successful submit
        //resetForm: true        // reset the form after successful submit

        timeout:   3000
    };

    $('form').submit(function() {
        $(this).ajaxSubmit(options);
        return false;
    });



</script>
</body>

</html>