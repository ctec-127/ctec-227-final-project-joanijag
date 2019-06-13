// https://stackoverflow.com/questions/39670504/resizable-textarea-in-bootstrap-modal-dialogue
function expandTextarea(id) {
  document.getElementById(id).addEventListener('keyup', function () {
    this.style.overflow = 'hidden';
    this.style.height = 0;
    this.style.height = this.scrollHeight + 'px';
  }, false);
}

expandTextarea('txtarea');