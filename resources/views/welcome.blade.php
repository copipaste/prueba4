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
                public Nodo izq;
                public Nodo der;
                public int elem;
                
            
                public Nodo(int elem) {
                    this.izq = this.der = null;
                    this.elem = elem;
                 
                }
            }//-------------------------------------------------------------------
            
            
            public class Arbol {
                
                
                public Nodo raiz;
                
                public Arbol() {
                    this.raiz = null;
                }
                
                public void insertar (int x){
                    raiz = insertar(raiz,x);
                }
                
                private Nodo insertar (Nodo p, int x){
                    
                    if(p == null) return new Nodo(x);
                    
                    if(x < p.elem){
                        p.izq = insertar(p.izq, x);
                    }else{
                        p.der = insertar(p.der, x);
                    }
                    return p;
                }
                
                public void preOrden(){
                    preOrden(raiz);
                }
                private void preOrden(Nodo p){
                    if(p == null){
                        return;
                    }
                    
                    System.out.println(p.elem);
                    preOrden(p.izq);
                    preOrden(p.der);
                }
                
                public void InOrden(){
                    InOrden(raiz);
                }
                
                private void InOrden(Nodo p){
                    if (p == null) return;
                    
                    InOrden(p.izq);
                    System.out.println(p.elem);
                    InOrden(p.der);
                }
                
                public void PostOrden(){
                    PostOrden(raiz);
                }
                private void PostOrden(Nodo p){
                    if (p == null) return;
                    
                    InOrden(p.izq);
                    InOrden(p.der);
                    System.out.println(p.elem);
                }
                
                public void niveles(){
                    LinkedList<Nodo> l = new LinkedList();
                    l.add(raiz);
                    
                    while(!l.isEmpty()){
                        Nodo p = l.getFirst();
                        System.out.println(p.elem);
                        if (p.izq != null)  l.add(p.izq);
                        
                        if (p.der != null) l.add(p.der);
                        
                        l.removeFirst();
                    }
                 }
            
              
                
                public void eliminar(int x){
                    raiz = eliminar(raiz,x);
                }
                private Nodo eliminar(Nodo p, int x){
                    if (p == null) {
                        return null;
                    }
                    if(p.elem == x){
                        return eliminarNodo(p);
                    }
                    if(x < p.elem){
                        p.izq = eliminar(p.izq, x);
                    }else{
                        p.der = eliminar(p.der, x);
                    }
                    return p;
                }
                
                private Nodo eliminarNodo(Nodo p){
                    if(p.izq == null && p.der == null) return null;
                    
                    if(p.izq != null && p.der == null) return p.izq;
                    
                    if(p.izq == null && p.der != null) return p.der;
                    
                    int y = InmediatoInf(p.izq);
                    p.elem = y;
                    p.izq = eliminar(p.izq, y);
                    return p;
            
                }
                private int InmediatoInf(Nodo p){
                    if(p.der == null){
                        return p.elem;
                    }else{
                       return InmediatoInf(p.der);
                    }
                    
                }
                
                public void mostrarNivel() {
                    mostrarNivel(raiz, 1);
                }
            
                private void mostrarNivel(Nodo p, int nivel) {
                    if (p == null) {
                        return;
                    }
            
                    mostrarNivel(p.izq, nivel + 1);
                    System.out.println(p.elem + "  " + nivel);
                    mostrarNivel(p.der, nivel + 1);
                }
                
                metodo que dado dos raices de dos arboles diferentes verifica si son iguales 
                public boolean SonIguales(Nodo a, Nodo b) {
                    if (a == null && b != null) {
                        return false;
                    }
                    if (a != null && b == null) {
                        return false;
                    }
                    if (a == null && b == null) {
                        return true;
                    }
            
                    if (this.esHoja(a) && esHoja(b)) {
                        if (a.elem == b.elem) {
                            return true;
                        } else {
                            return false;
                        }
                    } else {
            
                        boolean x = SonIguales(a.izq, b.izq);
                        boolean y = SonIguales(a.der, b.der);
            
                        if (x && y && a.elem == b.elem) {
                            return true;
                        } else {
                            return false;
                        }
            
                    }
            
                }
            
            
                
                //------------------------------5 METODOS CONSULTA ABB-------------------------------------
                
                public int suma(){
                    return suma(raiz);
                }
                private int suma(Nodo p){
                    if(p == null){
                        return 0;
                    }else{
                    
                    int sumaI = suma(p.izq);
                    int sumaD = suma(p.der);
                    return sumaI + sumaD + p.elem; 
                    }
                }
                
                public boolean seEncuentra(int x){
                    return seEncuentra(raiz,x);
                }
                private boolean seEncuentra(Nodo p, int x){
                    if (p == null) {
                        return false;
                    }else{
                        boolean I = seEncuentra(p.izq, x);
                        boolean D = seEncuentra(p.der, x);
                        
                        return(I || D || p.elem == x);
                    }
              
                }
                
                public int cantidadNodos(){
                    return cantidadNodos(raiz);
                }
                private int cantidadNodos(Nodo p){
                    if(p == null){
                        return 0;
                    }else{
                    
                    int sumaI = cantidadNodos(p.izq);
                    int sumaD = cantidadNodos(p.der);
                    return sumaI + sumaD + 1; 
                    }
                }
                
                public int menor(){
                    return menor(raiz);
                }
                private int menor(Nodo p){
                    if(p.izq == null){
                        return p.elem;
                    }else{
                    
                    return menor(p.izq);
            
                    }
                }
                 
                public int alturaElem(int x){
                    return alturaElem(raiz,x,1);
                }
                private int alturaElem(Nodo p, int x,int alturaActual){
                    if (p == null){
                        return 0;
                    }
                    if(p.elem == x){
                        return alturaActual;
                    }
                    int resI = alturaElem(p.izq,x,alturaActual+1);
                    int resD = alturaElem(p.der, x,alturaActual+1);
                    
                    if (resI != 0 || resD != 0){
                        return resI + resD;
                    }else{
                        return 0;
                    }
                   
                }
                
            //------------------------------5 METODOS ELIMINANDO ELEMENTOS DE UN ARBOL--------------------------
            
                public void eliminarHojas() {
                    raiz = eliminarHojas(raiz);
                }
            
                private Nodo eliminarHojas(Nodo p) {
                    if (p == null) {
                        return null;
                    }
                    if (p.izq == null && p.der == null) {
                        return null;
                    }
                    p.izq = eliminarHojas(p.izq);
                    p.der = eliminarHojas(p.der);
                    return p;
                }
                
                
                public void eliminarPares() {
                    raiz = eliminarPares(raiz);
                }
            
                private Nodo eliminarPares(Nodo p) {
                    if (p == null) {
                        return null;
                    }
            
                    p.izq = eliminarPares(p.izq);
                    p.der = eliminarPares(p.der);
            
                    if (p.elem % 2 == 0) {
                        return eliminarNodo(p);
                    }
                    return p;
                }
                
                
                public void eliminarMenor() {
                    raiz = eliminarMenor(raiz);
                }
            
                private Nodo eliminarMenor(Nodo p) {
                    if (p == null) {
                        return null;
                    }
                    if (p.izq == null) {
                        return null;
                    }
                    p.izq = eliminarMenor(p.izq);
                    return p;
                }
                
                
                public void eliminarRaices() {
                    raiz = eliminarRaices(raiz);
                }
            
                private Nodo eliminarRaices(Nodo p) {
                    if (p == null) {
                        return null;
                    }
            
                    p.izq = eliminarRaices(p.izq);
                    p.der = eliminarRaices(p.der);
                    if (p.izq != null || p.der != null) {
                        return eliminarNodo(p);
                    }
                    return p;
                }
                
                public void eliminarNivel(int n) {
                    raiz = eliminarNivel(raiz, 1, n);
                }
            
                private Nodo eliminarNivel(Nodo p, int actual, int n) {
                    if (p == null) {
                        return null;
                    }
                    if (actual == n) {
                        return eliminarNodo(p);
                    }
                    p.izq = eliminarNivel(p.izq, actual + 1, n);
                    p.der = eliminarNivel(p.der, actual + 1, n);
                    return p;
                }
                
            
                
            }//fin codigo 
            
        </code>
        </pre>

</body>
</html>








