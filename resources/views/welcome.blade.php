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
        
            public int mayor(){
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
            public int seEncuentra(int x){
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
                    int cantidad = 0;
                    for (int i = 0; i < cantElem; i++) {
                        if (x == arreglo[i]) cantidad++;
                    }
                    return cantidad;
                }
            }
        
        
            public int[] incrementarEnUno(int[] antiguoArreglo){
                int[] nuevoArreglo = new int[antiguoArreglo.length + 1];
                for (int i = 0; i < antiguoArreglo.length; i++){
                    nuevoArreglo[i] = antiguoArreglo[i];
                }
                cantElem++;
                return nuevoArreglo;
            }
        //-----------------------------------------------------------------------------------
        
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
                String S1 = "[";
                Nodo p = prim;
                while (p != null) {
                    S1 = S1 + p.elem;
                    if (p.prox != null) {
                        S1 = S1 + ", ";
                    }
                    p = p.prox;
                }
                S1 = S1 + "]";
                return S1;
            }
            
        
            
            public void insertarPrim(int x) {
                if (vacia()) {
                    prim = ult = new Nodo(null,x, null);
                } else {
                    prim = prim.ant = new Nodo(null,x, prim);
                }
                cantElem++;
            }
            public void insertarUlt(int x) {
                if (vacia()) {
                    prim = ult = new Nodo(null,x, null);
                } else {
                    ult = ult.prox = new Nodo(ult,x, null);
                }
                cantElem++;
            }
            public void eliminarPrim() {
        
                if (this.vacia()) {
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
                if (this.vacia()) return;
                
                if (ult.ant == null) 
                    prim = ult = null;
                 
                else {
                    ult.ant.prox = null;
                    ult = ult.ant;
                    }
                cantElem = cantElem - 1;
            }
        
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
                                ap.prox = p.ant = new Nodo(ap, x, p);
                                cantElem++;
                            }
                            pos++;
                            ap = p;
                            p = p.prox;
                        }
                    }
        
                }
            }
                
            public boolean iguales (){
          
                Nodo p = prim;
                if(p.prox == null) return true;
                
                while(p.prox != null){
                    if(p.elem != p.prox.elem) return false;
                    p = p.prox;
                }
                return true;
            }
            public int mayor(){
                Nodo p = prim;
                int elmayor = p.elem;
                while(p != null){
                    if(p.elem >= elmayor){
                        elmayor = p.elem;
                    }
                    p = p.prox;
                }
                return elmayor;
               
            }
            public boolean seEncuentra(int x) {
                Nodo p = prim;
                
                while (p != null) {
                    if (p.elem == x) {
                        return true;
                    }
                    p = p.prox;
                }
                return false;
        
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
                return -1
            } 
        </code>
        </pre>

</body>
</html>








