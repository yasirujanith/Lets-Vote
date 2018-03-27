<div id="catestory">

  <div class="content">
     <h2>some title here</h2>
      <p>some content here</p>
  </div>

  <div class="content">
     <h2>some title here</h2>
      <p>some content here</p>
  </div>

  <div class="content">
     <h2>some title here</h2>
      <p>some content here</p>
  </div>

</div>

<script>
  var div = document.getElementById( 'catestory' );
  div.onmouseover = function() {
    this.style.backgroundColor = 'green';
    var h2s = this.getElementsByTagName( 'h2' );
    h2s[0].style.backgroundColor = 'blue';
  };
  div.onmouseout = function() {
    this.style.backgroundColor = 'transparent';
    var h2s = this.getElementsByTagName( 'h2' );
    h2s[0].style.backgroundColor = 'transparent';
};
</script>