console.log('App para área y perímetro de un polígono');

function calcular(){
    const forma = document.getElementById('forma');
    let n = parseInt(forma['lados'].value);
    let l = parseFloat(forma['longitud'].value);
    
    let perimetro = parseFloat(n) * parseFloat(l);
    if(isNaN(perimetro))
        perimetro = 'La operación no incluye números';
    document.getElementById('perimetro').value = `${perimetro}`;
    console.log(`Perímetro: ${perimetro}`);
}