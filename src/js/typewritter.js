class Typewritter {
    constructor({ text, time = 3000 }) {
      this.texts = text.split(",");
      this.sT = document.querySelector(".sub-heading");
      this.realTime = time; // tiempo real
      this.wait = time + 4000; // tiempo de espera
      this.changeTime = 0; // tiempo que usara el intervalo
      this.length = this.texts.length; // cantidad de letras
      this.countChar = 0; // contador de letras escritas
      this.current = 0;
      this.flag = false;
  
      this.cutText();
    }
  
    cutText() {
      const text = this.texts[this.current];
      const tLength = this.texts[this.current].length;
      
      // tiempo de espera al finalizar la palabra
      if (this.countChar === tLength){
        this.changeTime = this.wait;
      } 
      
      // cambio de tiempo de retorno
      if (this.flag && this.countChar === tLength - 1){
        this.changeTime = this.realTime / 4;
      }
        
      // tiempo real para cada letra desde que comienza la palabra
      if (this.countChar === 0) {
        this.changeTime = this.realTime;
      }
  
      this.drawText(text.substr(0, this.countChar));
   
      // Si flag es false aumenta el contador para seguir escribiendo
      if (!this.flag) {
        this.countChar++;
        if (this.countChar === tLength) {
          this.flag = true;
        }
        
      // Si flag es true disminuye el contador para eliminar letras  
      } else if (this.flag) {
        this.countChar--;
        if (this.countChar === 0) {
          this.flag = false;
          this.current = ++this.current % this.length;
        }
      }
  
      setTimeout(() => this.cutText(), this.changeTime);
    }
  
    drawText(chars) {
      this.sT.innerHTML = chars;
    }
  }
  
  new Typewritter({
    text: "Lorem ipsum dolor sit amet,consectetur adipiscing elit,Quisque vestibulum", // palabras usadas para el typewritter
    time: 100 // velocidad de escritura
  });
  