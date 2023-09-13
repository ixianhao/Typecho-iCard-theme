var pjax = new Pjax({
  // 在页面进行 PJAX 时需要被替换的元素或容器，一条一个 CSS 选择器，数组形式
  selectors: [
    "title",
    "meta[name=description]",
    "main"
  ],
  cacheBust: false
})


document.addEventListener('pjax:send', function (){
    NProgress.start();
});
 
document.addEventListener('pjax:complete', function (){
    NProgress.done(); ;
});
