<?php
// Load Modules
require_once('modules/module_protect1.php');

// Parameter

// Functions

// Process
?>
<?php if(UserPage()) : ?>
  <header>
    <table>
      <tbody>
        <tr>
          <td class="logo">
            <a href="?p=0" class="logo">
              <img src="img/logo.png">
            </a>
          </td>
          <td class="hamberger">
            <input type="checkbox" id="menuicon">
            <label for="menuicon">
              <span></span>
              <span></span>
              <span></span>
            </label>
            <div class="sidebar">
              <input id="subbtn1" type="checkbox">
              <label for="subbtn1">요양원소개</label>
              <ul>
                <li><a href="?p=2#sub1">인사말</a></li>
                <li><a href="?p=2#sub2">시설소개</a></li>
                <li><a href="?p=2#sub3">오시는 길</a></li>
              </ul>
              <input id="subbtn2" type="checkbox">
              <label for="subbtn2">서비스 소개</label>
              <ul>
                <li><a href="?p=3#sub1">노인장기요양보험</a></li>
                <li><a href="?p=3#sub2">이용 안내</a></li>
              </ul>
              <input id="subbtn3" type="checkbox">
              <label for="subbtn3">상담신청</label>
              <ul>
                <li><a href="?p=4">상담신청</a></li>
              </ul>
              <input id="subbtn4" type="checkbox">
              <label for="subbtn4">게시판</label>
              <ul>
                <li><a href="?p=5">공지사항</a></li>
                <li><a href="?p=6">갤러리</a></li>
                <li><a href="?p=7">일정표</a></li>
                <li><a href="?p=8">생활시간표</a></li>
              </ul>
            </div>
          </td>
          <td class="nav">
            <ul>
              <li>
                <a href="?p=2">요양원소개</a>
                <ul>
                  <a href="?p=2#sub1"><li>인사말</li></a>
                  <a href="?p=2#sub2"><li>시설소개</li></a>
                  <a href="?p=2#sub3"><li>오시는 길</li></a>
                </ul>
              </li><li>
                <a href="?p=3">서비스 소개</a>
                <ul>
                  <a href="?p=3#sub1"><li>노인장기요양보험</li></a>
                  <a href="?p=3#sub2"><li>이용 안내</li></a>
                </ul>
              </li><li>
                <a href="?p=4">상담신청</a>
              </li><li>
                <a href="?p=5">게시판</a>
                <ul>
                  <a href="?p=5"><li>공지사항</li></a>
                  <a href="?p=6"><li>갤러리</li></a>
                  <a href="?p=7"><li>일정표</li></a>
                  <a href="?p=8"><li>생활시간표</li></a>
                </ul>
              </li>
            </ul>
          </td>
        </tr>
      </tbody>
    </table>
  </header>
<?php elseif(AdminPage()) : ?>
  <nav>
    <div class="logo">
      <img src="files/logo/logo.png">
    </div>
    <div class="list">
      <div id="nv_container">
      <ul>
          <li class="o_click">
             <a>제품 관리</a>
              <ul class="o_down">
                <li><a style="cursor:pointer;" class="clicker" onclick="changeIframeUrl('admin_list.php?var=cpu')">cpu</a></li>
                <li><a style="cursor:pointer;"class ="clicker" onclick="changeIframeUrl('admin_list.php?var=mainboard')">mainboard</a></li>
                <li><a style="cursor:pointer;"class ="clicker" onclick="changeIframeUrl('admin_list.php?var=power')">power</a></li>
                <li><a style="cursor:pointer;"class ="clicker" onclick="changeIframeUrl('admin_list.php?var=case')">case</a></li>
                <li><a style="cursor:pointer;"class ="clicker" onclick="changeIframeUrl('admin_list.php?var=cooler')">cooler</a></li>
                <li><a style="cursor:pointer;"class ="clicker" onclick="changeIframeUrl('admin_list.php?var=odd')">Odd</a></li>
                <li><a style="cursor:pointer;"class ="clicker" onclick="changeIframeUrl('admin_list.php?var=memory')">memory</a></li>
                <li><a style="cursor:pointer;"class ="clicker" onclick="changeIframeUrl('admin_list.php?var=graphicscard')">graphicscard</a></li>
                <li><a style="cursor:pointer;"class ="clicker" onclick="changeIframeUrl('admin_list.php?var=storage')">storage</a></li>
              </ul>
          </li>
      </ul>
      </div>
      <a style="cursor:pointer;"class ="clicker" onclick="changeIframeUrl('gallery_list.php')">배너 수정</a>
      <a style="cursor:pointer;"class ="clicker" onclick="changeIframeUrl('consulting_list.php')">상담 목록</a>
      <a style="cursor:pointer;"class ="clicker" onclick="changeIframeUrl('admin_delivery.php')">배송 관리</a>
      <a style="cursor:pointer;"class ="clicker" onclick="changeIframeUrl('sign-modify.php')">비밀번호 변경</a>
      <a style="cursor:pointer;"class ="clicker" href="sign-out.php">로그아웃</a>
    </div>
  </nav>
  <script>
    $(document).ready(function(){
      $('.o_click').mouseover(function(){
        $('.o_down > li').stop().slideDown();
        $('.o_down > li').css('display','block');

      }).mouseleave(function(){
        $('.o_down > li').stop().slideUp();
      });
    });
  </script>
<?php endif ?>
