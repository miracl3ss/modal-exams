let Mod = document.getElementById("mod");

let Exit = document.getElementById("exit").addEventListener("click",()=>{
    location.reload ();
    Mod.close();
})



let array = [];
let radioInputs = document.querySelectorAll('input[type="radio"]');
radioInputs.forEach(input => {
    input.addEventListener('change', function() {
      if (this.checked) {
        array.push(this.value);
      }
    });
  });

  let Sub = document.getElementById("sub");
  Sub.addEventListener('click', function() {
    Mod.showModal();
    
    
    // Вывести выбранные значения в блок section
    array.forEach(value => {
      let valueElement = document.createElement('section');
      valueElement.id = "L"
      valueElement.textContent = value;
      Mod.append(valueElement);
    });
  });