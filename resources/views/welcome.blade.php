<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre>
        <code>
            public class Nodo {
                public Nodo ant;
            public int elem;
            public Nodo prox;
        
            public Nodo (Nodo ant,int elem, Nodo prox){
                this.ant = ant;
                this.elem = elem;
                this.prox = prox;
            }
        }

        public class Lista {

            public Nodo prim;
            public int cantElem;
            public Nodo ult;
        
            public Lista() {
                prim = ult = null;
                cantElem = 0;
            }
        
            public boolean vacia() {
                return (prim == null && ult == null);
            }
        
            public String toString() {
                String s1 = "[";
                Nodo p = prim;
        
                while (p != null) {
                    s1 = s1 + p.elem;
        
                    if (p.prox != null) {
                        s1 = s1 + " ,";
                    }
                    p = p.prox;
                }
                s1 = s1 + "]";
                return s1;
            }
        
            public void insertarPrim(int x) {
                if (vacia()) {
                    prim = ult = new Nodo(null, x, null);
                } else {
                    prim = prim.ant = new Nodo(null, x, prim);
                }
                cantElem++;
            }
        
            public void insertarUlt(int x) {
                if (vacia()) {
                    prim = ult = new Nodo(null, x, null);
                } else {
                    ult = ult.prox = new Nodo(ult, x, null);
                }
                cantElem++;
            }
        
         
            public void eliminarPrim() {
                if (vacia()) {
                    return;
                }
                if (prim.prox == null) {
                    prim = ult = null;
                } else {
                    prim.prox.ant = null;
                    prim = prim.prox;
                }
                cantElem = cantElem - 1;
        
            }
        
        
            public void eliminarUlt() {
                if (this.vacia()) {
                    return;
                }
        
                if (ult.ant == null) {
                    prim = ult = null;
                } else {
                    ult.ant.prox = null;
                    ult = ult.ant;
                }
                cantElem = cantElem - 1;
            }
        
            public boolean Iguales() {
                if (vacia()) {
                    throw new IllegalArgumentException("LISTA VACIA INSERTAR ELEMENTOS");
                } else {
                    Nodo p = prim;
                    while (p.prox != null) {
                        if (p.elem != p.prox.elem) {
                            return false;
                        }
                        p = p.prox;
                    }
                    return true;
                }
            }
        
            public int mayorElem() {
                if (vacia()) {
                    throw new IllegalArgumentException("LISTA VACIA");
                } else {
                    Nodo p = prim;
                    int max = 0;
                    while (p != null) {
                        if (p.elem > max) {
                            max = p.elem;
                        }
                        p = p.prox;
                    }
                    return max;
                }
        
            }
        
            public boolean seEncuentra(int x) {
                if (vacia()) {
                    return false;
                } else {
                    Nodo p = prim;
                    while (p != null) {
                        if (x == p.elem) {
                            return true;
                        }
                        p = p.prox;
                    }
                    return false;
                }
            }
        
            public int frecuencia(int x) {
                Nodo p = prim;
                int frecuencia = 0;
                while (p != null) {
                    if (p.elem == x) {
                        frecuencia++;
                    }
                    p = p.prox;
                }
                return frecuencia;
        
            }
        
            public int indexOf(int x) {
                Nodo p = prim;
                int pos = 0;
                while (p != null) {
                    if (p.elem == x) {
                        return pos;
                    }
                    pos++;
                    p = p.prox;
                }
                return -1;
        
            }
        
            //------------------------------------EXTRA-------------------
            public void insertarIesimo(int x, int i) {
                if (i < 1 || i > cantElem) {
                    System.out.println("posicion invalida");
                    return;
                } else {
                    if (i == 1) {
                        insertarPrim(x);
                    } else {
                        Nodo p = prim;
                        Nodo ap = null;
                        int pos = 1;
                        while (p != null) {
                            if (i == pos) {
                                this.insertarNodo(x, ap, p);
                            }
                            pos++;
                            ap = p;
                            p = p.prox;
                        }
                    }
        
                }
            }
        
        
            public void insertarNodo(int x, Nodo ap, Nodo p) {
                if (ap == null) {
                    this.insertarPrim(x);
                } else if (ap.prox == null) {
                    this.insertarUlt(x);
                } else {
                    ap.prox = p.ant = new Nodo(ap, x, p);
                    cantElem++;
                }
            }
        
            public void eliminarIesimo(int i) {
                if (i < 1 || i > cantElem) {
                    System.out.println("posicion invalida");
                    return;
                } else {
        
                    Nodo p = prim;
                    Nodo ap = null;
                    int pos = 1;
                    while (p != null) {
                        if (i == pos) {
                            p = this.eliminarNodo(ap, p);
                        }
                        pos++;
                        ap = p;
                        p = p.prox;
                    }
        
                }
            }
        
            public Nodo eliminarNodo(Nodo ap, Nodo p) {
                if (ap == null) {
                    this.eliminarPrim();
                    return prim;
                }
                if (p.prox == null) {
                    this.eliminarUlt();
                    return ult;  
                }
                ap.prox = p.prox;
                p.prox.ant = ap;
                cantElem--;
                return ap.prox;
            }
        
            
            public void insertarLugar(int x) {
                Nodo ap = null, p = prim;
                while (p != null && x > p.elem) {
                    ap = p;
                    p = p.prox;
                }
                this.insertarNodo(x, ap, p);
            }
        
            public void eliminarPares() {
                Nodo p = prim;
        
                while (p != null) {
                    if (p.elem % 2 == 0) {
                        p = this.eliminarNodo(p.ant, p);
                    } else {
                        p = p.prox;
                    }
        
                }
            }
        
        }//fin del codigo 

        

        public class Lista {
    
            private int[] arreglo;
            private int cantElem;
        
            private int maximo = 50;
        
            public Lista() {
                arreglo = new int[maximo];
                cantElem = 0;
            }
        
            public String toString(){
                String A = "[";
                for (int i = 0; i< cantElem; i++){
                    A = A + arreglo[i];
                    if( i != cantElem - 1){
                        A = A + ", ";
                    }
                }
                A = A + "]";
                return A;
            }
        
            public int[] incrementarEnUno(int[] antiguoArreglo){
                int[] nuevoArreglo = new int[antiguoArreglo.length + 1];
                for (int i = 0; i < antiguoArreglo.length; i++){
                    nuevoArreglo[i] = antiguoArreglo[i];
                }
                cantElem++;
                return nuevoArreglo;
            }
        
            public void insertarPrim(int x) {
        
                if (cantElem == 0) {
                    arreglo[0] = x;
                } else {
                    for (int i = cantElem; i > 0; i--) {
                        arreglo[i] = arreglo[i-1];
                    }
                    arreglo[0] = x;
                }
                cantElem++;
            }
        
            public void insertarUlt(int x) {
                if (cantElem == 0) {
                    arreglo[0] = x;
                } else {
                    arreglo[cantElem] = x;
                }
                cantElem++;
            }
            
            
                public void eliminarPrim() {
        
                if (cantElem == 0) {
                   return;
                } else {
                    for (int i = 0; i < this.cantElem ; i++) {
                        arreglo[i] = arreglo[i+1];
                    }
                    cantElem--;
                }
                
            }
                
                
            public void eliminarUlt() {
                if (cantElem == 0) {
                   return;
                } else {
                   arreglo[cantElem-1] = 0;
                   cantElem--; 
                }
            }
            
            
            
            
            public boolean iguales(){
                if (cantElem == 0) {
                    throw new IllegalArgumentException("lista vacia");
                } else {
                    int pivote = arreglo[0];
                    for (int i = 0; i < cantElem; i++) {
                        if (pivote != arreglo[i]) return false;
                    }
                    return true;
                }
            }
        
            public int mayorElemento(){
                if (cantElem == 0) {
                    throw new IllegalArgumentException("lista vacia");
                } else {
                    int max = 0;
                    for (int i = 0; i < cantElem; i++) {
                        if (max < arreglo[i]) max = arreglo[i];
                    }
                    return max;
                }
            }
            public boolean seEncuentra(int x){
                if (cantElem == 0) {
                    throw new IllegalArgumentException("lista vacia");
                } else {
        
                    for (int i = 0; i < cantElem; i++) {
                        if (x == arreglo[i]) return true;
                    }
                    return false;
                }
            }
            
            public int frecuencia(int x){
                if (cantElem == 0) {
                    throw new IllegalArgumentException("lista vacia");
                } else {
                    int cantidad = 0;
                    for (int i = 0; i < cantElem; i++) {
                        if (x == arreglo[i]) cantidad++;
                    }
                    return cantidad;
                }
            }
                
                
             public int indexOf(int x){
                if (cantElem == 0) {
                    throw new IllegalArgumentException("lista vacia");
                } else {
                    for (int i = 0; i < cantElem; i++) {
                        if (x == arreglo[i]) return i+1;
                    }
                    return -1;
                }
            }
              
             
             
            //----------------------------extra---------------------------------
          public void insertarIesimo(int x, int i) {
                if (i == 0) {
                    insertarPrim(x);
                } else {
                    
                    for (int j = this.cantElem; j >= i; j--) {
                        this.arreglo[j] = this.arreglo[j-1];
                    }
                    this.arreglo[i] = x;
                    this.cantElem++;
                }
        
            }
             
          
              public void eliminarTodo(int x) {
                int i = 0;
                while (i < this.cantElem) {
                    if (this.arreglo[i] == x) {
                        eliminarIesimo(i);
                    } else {
                        i++;
                    }
                }
            }
        
            public void eliminarIesimo(int i) {
                if (this.cantElem == 0 || i < 0 || i >= this.cantElem) {
                    return;
                }
                for (int j = i; j < this.cantElem - 1; j++) {
                    this.arreglo[j] = this.arreglo[j + 1];
                }
                this.cantElem--;
            }
            public void insertarLugar(int x) {
                int i = 0;
                while (i < this.cantElem && this.arreglo[i] < x) {
                        i++;  
                }
                insertarIesimo(x, i);
            }
            
            
            public void eliminarPares() {
                int i = 0;
                while (i < this.cantElem) {
                    if (this.arreglo[i] % 2 == 0) {
                        eliminarIesimo(i);
                    } else {
                        i++;
                    }
                }
            }
            
                
                
        }//-------------------FIN CODIGO -------------------------
        
        </code>
        </pre>

</body>
</html>








