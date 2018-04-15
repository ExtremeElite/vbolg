<?php
/**
 * Created by PhpStorm.
 * User: 三杯虾
 * Date: 2018\4\14 0014
 * Time: 9:40
 */
?>
<form method="post" action="" id="form1" class="layui-form">
			<div class="mainwrap">
				<div class="main_cont">

					<div class="mwrap">
						<div class="layui-form-item">

							<div class="layui-inline">
								<label class="layui-form-label my-form-label">日期：</label>

								<div class="layui-input-inline" style="width: 150px;">
									<input class="layui-input" placeholder="开始日" id="LAY_demorange_s">
								</div>

								<div class="layui-form-mid">至</div>

								<div class="layui-input-inline" style="width: 150px;">
									<input class="layui-input" placeholder="截止日" id="LAY_demorange_e">
								</div>
							</div>
							<div class="layui-inline">
								<label class="layui-form-label my-form-label">选择类别：</label>
								<div class="layui-input-block my-input-block">
									<select name="ddlBuyerList" id="ddlBuyerList">
										<option value="0">不限</option>
										<option value="17">美嘉国旅</option>
										<option value="18">神州国旅</option>
										<option value="21">李易天的测试渠道</option>
										<option value="22">北京国旅</option>
										<option value="23">明道签证</option>
										<option value="27">好asb</option>

									</select>
								</div>
							</div>
							<div class="layui-inline">
								<label class="layui-form-label my-form-label">状态：</label>
								<div class="layui-input-block my-input-block">
									<select name="ddlFinanceStatus" id="ddlFinanceStatus">
										<option value="0">不限</option>
										<option value="1">待审核</option>
										<option value="2">已发布</option>

									</select>
								</div>
							</div>
							<div class="layui-inline">
							<div class="search_input">
								<input name="" placeholder="文章搜索" type="text" id="txtSupName">
							</div>
						</div>
						</div>
					</div>
					<div class="mwrap">
						<table width="100%" border="0" class="tabletit">
							<tbody>
								<tr>
									<th scope="col" width="5%">ID</th>
									<th scope="col" width="35%">文章标题</th>
									<th scope="col" width="10%">来源</th>
									<th scope="col" width="5%">分类</th>
									<th scope="col" width="10%">发布时间</th>
									<th scope="col" width="10%">状态</th>
									<th scope="col" width="10%">标签</th>
									<th scope="col" width="15%">操作</th>
								</tr>
							</tbody>
						</table>
						<div id="content">
							<table width="100%" border="0" class="tablecon" lay-skin="line" data-id="17">
								<tbody>
									<tr>
										<td width="5%"><span>1</span></td>
										<td width="35%" class="title">上个综艺脸都崩了！王思聪的前女友只有她穷困潦倒？</td>
										<td width="10%">网络</td>
										<td width="5%">综艺</td>
										<td width="10%">2017-03-27</td>
										<td width="10%"><span class="color-red">已发布</span></td>
										<td width="10%">美食,重庆,味道</td>
										<td width="15%">
											<a href="edit.html" title="编辑" class="layui-btn layui-btn-normal layui-btn-mini bg-red">编辑</a>
											<button type="button" data-name="下架" data-opt="sell" data-id="15" class="layui-btn layui-btn-warm layui-btn-mini ">下架</button>
											<a class="a-btn" title="删除"><i class="fa fa-trash-o"></i></a>
										</td>
									</tr>
								</tbody>
							</table>
							<table width="100%" border="0" class="tablecon" lay-skin="line" data-id="18">
								<tbody>
									<tr>
										<td width="5%"><span >2</span></td>
										<td width="35%" class="title">10年后中国会是世界首屈一指强国，台湾不赶快回归，还有哪里可以去？丨睿视角	</td>
										<td width="10%">三杯虾</td>
										<td width="5%">财经</td>
										<td width="10%">2018-01-17</td>
										<td width="10%"><span class="color-blue">待审核</span></td>
										<td width="10%">美食,重庆,味道</td>
										<td width="15%">
											<a href="edit.html" title="编辑" class="layui-btn layui-btn-normal layui-btn-mini bg-red">编辑</a>
											<button type="button" data-name="审核" data-opt="pass" class="layui-btn layui-btn-normal layui-btn-mini bg-blue">审核</button>
											<a href="" class="a-btn" title="删除"><i class="fa fa-trash-o"></i></a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div style="text-align: right;">
							<div class="layui-box layui-laypage layui-laypage-default" id="paged"></div>
						</div>
					</div>
				</div>
			</div>
			<script>
layui.use(['form', 'laydate'], function() {
    var laydate = layui.laydate;
    var start = {
        min: '2010-08-31 23:59:59',
						max: laydate.now(),
						istoday: false,
						choose: function(datas) {
            end.min = datas; //开始日选好后，重置结束日的最小日期
            end.start = datas //将结束日的初始值设定为开始日
						}
					};

					var end = {
        min: '2010-08-31 23:59:59',
						max: laydate.now(),
						istoday: false,
						choose: function(datas) {
            start.max = datas; //结束日选好后，重置开始日的最大日期
        }
					};
					document.getElementById('LAY_demorange_s').onclick = function() {
                        start.elem = this;
                        laydate(start);
                    }
					document.getElementById('LAY_demorange_e').onclick = function() {
                        end.elem = this
						laydate(end);
					}
				})
			</script>
</form>