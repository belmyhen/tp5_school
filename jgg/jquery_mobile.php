<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<style>
th {
    border-bottom: 1px solid #d6d6d6;
}

tr:nth-child(even) {
    background: #e9e9e9;
}
</style>
</head>
<body>

<div data-role="page" id="pageone">
  <div data-role="header">
    <h1>欢迎来到我的主页</h1>
  </div>

  <div data-role="main" class="ui-content">
    <p>欢迎!</p>
    <a href="#pagetwo" data-transition="slide">弹出对话框</a><br />
    <a href="#myPopupDialog" data-rel="popup" data-position-to="window" data-transition="fade" class="ui-btn ui-corner-all ui-shadow ui-btn-inline">打开对话框弹窗</a>
    <button class="ui-btn">主頁</button>
    <input type="button" value="選項">
   <p>以下演示了弹窗所有过渡效果的实例。</p>
    <p><b>注意：</b> 从性能方面上考虑， jQuery Mobile 推荐使用 "pop", "fade" 或 "none" 过渡效果。</p>
    <a href="#myPopup" data-rel="popup" class="ui-btn" data-transition="fade">淡入</a>
    <a href="#myPopup" data-rel="popup" class="ui-btn" data-transition="flip">翻转</a>
    <a href="#myPopup" data-rel="popup" class="ui-btn" data-transition="flow">抛出当前页后显示</a>
    <a href="#myPopup" data-rel="popup" class="ui-btn" data-transition="pop">弹出</a>
    <a href="#myPopup" data-rel="popup" class="ui-btn" data-transition="slide">向左滑动</a>
    <a href="#myPopup" data-rel="popup" class="ui-btn" data-transition="slidefade">向左滑动并淡入</a>
    <a href="#myPopup" data-rel="popup" class="ui-btn" data-transition="slideup">向上滑动 up</a>
    <a href="#myPopup" data-rel="popup" class="ui-btn" data-transition="slidedown">向下滑动</a>
    <a href="#myPopup" data-rel="popup" class="ui-btn" data-transition="turn">转向</a>
    <a href="#myPopup" data-rel="popup" class="ui-btn" data-transition="none" >无过渡效果。</a>
    <a href="#pagetwo" data-transition="slide" class="ui-btn ui-icon-search ui-btn-icon-left">搜索</a>
    <a href="#pagetwo" data-role="button" data-inline="true">访问第二个页面</a>
  </div>
  
  <!-- myPopupDialog -->
  <div data-role="popup" id="myPopupDialog">
      <div data-role="header">
        <h1>头部文本</h1>
      </div>

      <div data-role="main" class="ui-content">
        <h2>欢迎访问弹窗对话框!</h2>
        <p>jQuery Mobile 非常有意思!</p>
        <a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b ui-icon-back ui-btn-icon-left" data-rel="back">返回</a>
      </div>

      <div data-role="footer">
        <h1>底部文本</h1>
      </div>
    </div>
  <!-- myPopupDialog -->
  
  
  <div data-role="popup" id="myPopup">
  <p>这是一个简单的弹窗</p>
</div>

<p>回流模型表格在屏幕尺寸足够大时是水平显示，而在屏幕尺寸达到足够小时，所有的数据会变成垂直显示。</p>
    
    <p>重置窗口大小查看效果：</p>
    <table data-role="table" data-mode="columntoggle" class="ui-responsive ui-shadow" id="myTable">
      <thead>
        <tr>
         <th data-priority="6">CustomerID</th>
          <th>CustomerName</th>
          <th data-priority="1">ContactName</th>
          <th data-priority="2">Address</th>
          <th data-priority="3">City</th>
          <th data-priority="4">PostalCode</th>
          <th data-priority="5">Country</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Alfreds Futterkiste</td>
          <td>Maria Anders</td>
          <td>Obere Str. 57</td>
          <td>Berlin</td>
          <td>12209</td>
          <td>Germany</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Antonio Moreno Taquer</td>
          <td>Antonio Moreno</td>
          <td>Mataderos 2312</td>
          <td>Mico D.F.</td>
          <td>05023</td>
          <td>Mexico</td>
        </tr>
        <tr>
          <td>3</td>
          <td>Around the Horn</td>
          <td>Thomas Hardy</td>
          <td>120 Hanover Sq.</td>
          <td>London</td>
          <td>WA1 1DP</td>
          <td>UK</td>
        </tr>
        <tr>
          <td>4</td>
          <td>Berglunds snabbk</td>
          <td>Christina Berglund</td>
          <td>Berguvsven 8</td>
          <td>Lule</td>
          <td>S-958 22</td>
          <td>Sweden</td>
        </tr>
      </tbody>
    </table>


  <div data-role="footer">
    <h1>主页底部文本</h1>
  </div>
</div> 






<div data-role="page" data-dialog="true" id="pagetwo">

  <div data-role="header">
    <h1>我是一个对话框！</h1>
  </div>

  <div data-role="main" class="ui-content">
    <p>对话框与普通页面不同，它显示在当期页面上, 但又不会填充完整的页面，顶部图标 "X" 用于关闭对话框。</p>
    <a href="#pageone" data-transition="slide" data-direction="reverse">跳转到第一个页面</a>
  </div>

  <div data-role="footer">
    <h1>对话框底部文本</h1>
  </div>
</div> 

</body>
</html>
