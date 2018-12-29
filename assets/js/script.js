const flashData = $('.flash-data').data('flashdata');
if(flashData) {
	Swal({
		title: 'Data',
		text : 'Berhasil ' + flashData,
		type : 'success'
	});
}

// if tombol-hapus
$('.tombol-hapus').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal({
  title: 'Anda Yakin ?',
  text: "Data akan dihapus",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Hapus Data!'
}).then((result) => {
  if (result.value) {
 	document.location.href = href;
  }
})
});