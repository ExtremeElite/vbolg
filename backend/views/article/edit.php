<?php
/**
 * Created by PhpStorm.
 * User: 三杯虾
 * Date: 2018\4\14 0014
 * Time: 9:57
 */
?>

<form method="post" action="" id="form1" class="layui-form">
    <div class="main" style="margin-left: -210px; margin-top: -52px;">
        <div class="mainwrap">
            <div class="main_cont">
                <div class="mwrap">
                    <div class="layui-tab layui-tab-brief" lay-filter="demo">
                        <ul class="layui-tab-title">
                            <li class="layui-this">基本设置</li>
                            <li>文章内容页</li>
                        </ul>
                        <div class="layui-tab-content">
                            <div class="layui-tab-item layui-show">
                                <div class="charge_sy">
                                    <h3 class="title1">文章基本信息</h3>
                                    <div class="layui-block" style="margin: 5px 0;">
                                        <label class="layui-form-label">文章标题：<span style="color: red;">*</span></label>
                                        <div class="layui-input-block">
                                            <input name="title" type="text" id="title" class="layui-input"
                                                   lay-verify="required|Name" placeholder="文章标题">
                                        </div>
                                    </div>
                                    <div class="layui-block" style="margin: 5px 0;">
                                        <label class="layui-form-label">选择分类 ：<span style="color: red;">*</span></label>
                                        <div class="layui-input-inline">
                                            <select name="modules" lay-verify="required" lay-search="">
                                                <option value="">直接选择或搜索选择</option>
                                                <option value="1">layer</option>
                                                <option value="2">form</option>
                                                <option value="3">layim</option>
                                                <option value="4">element</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="layui-block" style="margin: 5px 0;">
                                        <label class="layui-form-label">文章描述：<span style="color: red;">*</span></label>
                                        <div class="layui-input-block">
                                            <textarea ols="30" rows="10" name="description" type="text" id="description"
                                                      class="layui-textarea" lay-verify="required|Name"
                                                      placeholder="文章描述"></textarea>
                                        </div>
                                    </div>
                                    <div class="layui-block" style="margin: 5px 0;">
                                        <label class="layui-form-label">文章位置：<span style="color: red;">*</span></label>
                                        <div class="layui-input-block">
                                            <input type="checkbox" name="like[index]" title="首页置顶">
                                            <input type="checkbox" name="like[carousel]" title="轮播图">
                                            <input type="checkbox" name="like[category]" title="频道置顶">
                                        </div>
                                    </div>
                                    <div class="layui-block" style="margin: 5px 0;">
                                        <label class="layui-form-label">URL地址：</label>
                                        <div class="layui-input-block">
                                            <input name="url" type="text" id="url" class="layui-input"
                                                   lay-verify="required" placeholder="10位字符串">
                                        </div>
                                    </div>
                                    <div class="layui-block" style="margin: 5px 0;">
                                        <label class="layui-form-label">外部URL：</label>
                                        <div class="layui-input-block">
                                            <input name="out_url" type="text" id="out_url" class="layui-input"
                                                   lay-verify="required" placeholder="外部URL">
                                        </div>
                                    </div>
                                    <h3 class="title1">文章头图</h3>
                                    <div class="layui-block" style="margin: 5px 0;">
                                        <div class="form-group smallpic">
                                            <div id="up_status" style="display:none"><img src="../img/loader.gif"
                                                                                          alt="uploading"></div>
                                            <div id="up_btn" class="btn">
                                                <span>添加图片</span>
                                                <input id="photoimg" type="file" name="photoimg">
                                            </div>

                                            <p>最大100KB，封面图。</p>
                                            <div id="preview">
                                                <img src="http://www.people.com.cn/NMediaFile/2017/1215/MAIN201712150858517959131402168.jpg"
                                                     alt="..." class="img-thumbnail">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-tab-item">
                                <script type="text/plain" id="editor" style="width:100%;height:240px;">
                                    <p></p>
                                </script>
                                </div>
                                </div>
                                <button class= "layui-btn layui-btn-normal"style = "background: #5FB878;">立即提交</button>
                 </div>
            </div>
        </div>
    </div>
</form>
<?php
$js=<<<JS
var ue = UE.getEditor('editor');
layui.use(['form', 'element'], function() {
var form = layui.form();
var element = layui.element();
});
layui.use('layedit', function() {
var layedit = layui.layedit;
layedit.build('mycontents');
});
JS;
$this->registerJs($js);
