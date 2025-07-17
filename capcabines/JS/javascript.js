var a = 0;
var b = 0;
var c = 0;
var d = 0;
var e = 0;
var f = 0;

function mostrarEst() {
	var list = document.getElementById("listE");

	if (b === 1) {mostrarMo();}
	if (c === 1) {mostrarTri();}
	if (d === 1) {mostrarCo();}
	if (e === 1) {mostrarCa();}
	if (f === 1) {mostrarI();}

	if (a === 0) {
		list.style.display = "block";
		a = 1;
	}else{
		list.style.display = "none";
		a = 0;
	}
}

function mostrarMo() {
	var list = document.getElementById("listM");

	if (a === 1) {mostrarEst();}
	if (c === 1) {mostrarTri();}
	if (d === 1) {mostrarCo();}
	if (e === 1) {mostrarCa();}
	if (f === 1) {mostrarI();}

	if (b === 0) {
		list.style.display = "block";
		b = 1;
	}else{
		list.style.display = "none";
		b = 0;
	}
}

function mostrarTri() {
	var list = document.getElementById("listT");

	if (a === 1) {mostrarEst();}
	if (b === 1) {mostrarMo();}
	if (d === 1) {mostrarCo();}
	if (e === 1) {mostrarCa();}
	if (f === 1) {mostrarI();}

	if (c === 0) {
		list.style.display = "block";
		c = 1;
	}else{
		list.style.display = "none";
		c = 0;
	}
}

function mostrarCo() {
	var list = document.getElementById("listCo");

	if (a === 1) {mostrarEst();}
	if (b === 1) {mostrarMo();}
	if (c === 1) {mostrarTri();}
	if (e === 1) {mostrarCa();}
	if (f === 1) {mostrarI();}

	if (d === 0) {
		list.style.display = "block";
		d = 1;
	}else{
		list.style.display = "none";
		d = 0;
	}
}

function mostrarCa() {
	var list = document.getElementById("listCa");

	if (a === 1) {mostrarEst();}
	if (b === 1) {mostrarMo();}
	if (c === 1) {mostrarTri();}
	if (d === 1) {mostrarCo();}
	if (f === 1) {mostrarI();}

	if (e === 0) {
		list.style.display = "block";
		e = 1;
	}else{
		list.style.display = "none";
		e = 0;
	}
}

function mostrarI() {
	var list = document.getElementById("listI");

	if (a === 1) {mostrarEst();}
	if (b === 1) {mostrarMo();}
	if (c === 1) {mostrarTri();}
	if (d === 1) {mostrarCo();}
	if (e === 1) {mostrarCa();}

	if (f === 0) {
		list.style.display = "block";
		f = 1;
	}else{
		list.style.display = "none";
		f = 0;
	}
}


function trocarEst(imgClicada) {
	var imgAtiva = document.getElementById("imgAtvEst");
	imgAtiva.src = imgClicada.src;

}

function trocarTri(imgClicada) {
	var imgAtiva = document.getElementById("imgAtvTri");
	imgAtiva.src = imgClicada.src;

}

function trocarCa(imgClicada) {
	var imgAtiva = document.getElementById("imgAtvCa");
	imgAtiva.src = imgClicada.src;

}




document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function () {
            const response = confirm("Tem certeza que deseja excluir a foto?");
            if (!response) return;

            const photoContainer = this.parentElement;
            const imgSrc = photoContainer.querySelector('img').src;
            const fileName = imgSrc.split('/').pop();
            const pasta = photoContainer.dataset.pasta;

            fetch('http://localhost/capcabines/delete.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    fileName: fileName,
                    pasta: pasta
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    console.log('Sucesso:', data.message);
                    console.log('Caminho:', data.caminho);
                    photoContainer.remove();
                } else {
                    console.error('Erro:', data.message);
                    alert('Erro: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Erro ao processar resposta:', error);
                alert('Erro inesperado ao excluir a imagem.');
            });
        });
    });
});

