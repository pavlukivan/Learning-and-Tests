$(document).ready(function () {
  $('#select').click(function () {
    var w = window.getSelection();
   // w.removeAllRanges();  // вроде бы старые промежутки удаляются автоматически при каждом клике
    var range = document.createRange();
    range.selectNode(this);
    w.addRange(range);
  });
});
// selectable - класс тех div-элементов, которые будут выделяться целиком при клике на них