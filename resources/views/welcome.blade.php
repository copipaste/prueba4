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
                public String nombre;
                public Nodo prox;
                public Arco prim;
                public Arco ult;
                public int cantArcos;
                
                public Nodo (String nombre, Nodo prox){
                    this.nombre =nombre;
                    this.prox = prox;
                    this.prim = this.ult=null;
                    this.cantArcos=0;
                }
                
               public String toString() {
                  return    nombre;
               }
           
                public void insertarArco(int valor, Nodo pDestino, Arco prox){
                    if (vacia()) {
                        prim=ult=new Arco(valor, pDestino,prox);
                    }else{
                        ult.prox = ult = new Arco(valor, pDestino,prox);
                    }
                    cantArcos++;
                }
                public boolean vacia(){
                    return this.prim == null;
                }
        }
        
        
        public class Arco {
                    public int valor;
                public Nodo pDestino;
                public Arco prox;
                
                
                public Arco(int valor, Nodo pDestino,Arco prox){
                    this.valor =valor;
                    this.pDestino = pDestino;
                    this.prox = prox;
                   
                }
                public String toString(){
                    return "";
                }
        }
        
        
        public class Grafo {
             public Nodo prim;
            public Nodo ult;
            public int cantNodos;
        
            public Grafo() {
                this.prim = this.ult = null;
                this.cantNodos = 0;
            }
        
            public String toString() {
                return "";
            }
        
            //Método que insertar un nodo en el grafo
            public void insertarNodo(String nombre) {
                if (seEncuentra(nombre)) {
                    return;
                }
                if (vacia()) {
                    prim = ult = new Nodo(nombre, null);
                } else {
                    ult.prox = ult = new Nodo(nombre, null);
                }
                cantNodos++;
            }
        
            //Método que inserta un arco en el grafo
            
            public void insertarArco(String nombOrig, String nombDest, int valor) {
                Nodo pOrigen = buscarNodo(nombOrig);
                Nodo pDestino = buscarNodo(nombDest);
                if (pOrigen == null || pDestino == null) {
                    return;
                }
                pOrigen.insertarArco(valor, pDestino, null);
        
            }
        
            public boolean vacia() {
                return prim == null;
            }
        
            public boolean seEncuentra(String nombre) {
                Nodo p = prim;
                while (p != null) {
                    if (p.nombre.equals(nombre)) {
                        return true;
                    }
                    p = p.prox;
                }
                return false;
            }
        
            private Nodo buscarNodo(String nombOrig) {
                Nodo p = prim;
                while (p != null) {
                    if (p.nombre.equals(nombOrig)) {
                        return p;
                    }
                    p = p.prox;
                }
                return null;
            }
        
            //Método que muestra un grafo. Muestra la lista de nodos, para cada nodo la lista de arcos con sus nodos destinos y sus respectivos valores.
            public void mostrarGrafo() {
                Nodo p = prim;
                while (p != null) {
                    System.out.print(p.nombre + "-> ");
                    Arco a = p.prim;
                    while (a != null) {
                        System.out.print(a.pDestino.nombre + "," + a.valor + ";");
                        a = a.prox;
                    }
                    System.out.println("");
                    p = p.prox;
                }
            }
        
            //Método que devuelve la cantidad de arcos que contiene el grafo
            public int cantidadArcos() {
                Nodo p = prim;
                int sum = 0;
                while (p != null) {
                    sum = sum + p.cantArcos;
                    p = p.prox;
                }
                return sum;
            }
        
            // Método que devuelve la cantidad de arcos que llegan al nodo
            public int cantidadLlegadas(String name1) {
                Nodo p = prim;
                int cantidad = 0;
                while (p != null) {
                    Arco a = p.prim;
                    while (a != null) {
                        if (a.pDestino.nombre.equals(name1)) {
                            cantidad++;
                        }
                        a = a.prox;
                    }
                    p = p.prox;
                }
                return cantidad;
            }
            
            //Método que muestra los nodos que tienen arcos así mismos.
            public void mostrarNodosBucle() {
                Nodo p = prim;
                
                while (p != null) {
                    Arco a = p.prim;
                    while (a != null) {
                        if (p.nombre.equals(a.pDestino.nombre)) {
                            System.out.println(p.nombre + " -> " + p.nombre);
                        }
                        a = a.prox;
                    }
                    p = p.prox;
                }
            }
        
            //Método que muestra los nodos islas. Nodos islas, son aquellos nodos que no tienen arcos que salen de él, ni arcos que llegan a él.
            public void mostrarNodosIslas() {
                Nodo p = prim;
                while (p != null) {
                    if (p.cantArcos == 0 && this.cantidadLlegadas(p.nombre) == 0) {
                        System.out.println(p.nombre);
                    }
                    p = p.prox;
                }
            }
        
            // Método que devuelve el mayor valor de los arcos del grafo
            
            public int mayorValor() {
                Nodo p = prim;
                int mayor = 0;
                while (p != null) {
                    Arco a = p.prim;
                    while (a != null) {
                        if(a.valor > mayor) mayor = a.valor;
                            a = a.prox;
                    }
                    p = p.prox;
                }
                return mayor;
            }
            
//------------------------------LOS OTROS 5 METODOS DE NAVEGACION BACKTRACKING-------------------------------------------
                
                public void mostrarCamino(String name1, String name2){
                    Nodo pOrigen = buscarNodo(name1);
                    Nodo pDestino = buscarNodo(name2);
                    
                    if(pOrigen == null || pDestino == null) return ;
                    
                    LinkedList<Nodo> L1 = new LinkedList();
                    L1.add(pOrigen);
                    mostrarCamino(L1,pOrigen,pDestino);
                    
                }
                
                public void mostrarCamino(LinkedList<Nodo> L1, Nodo pOrigen, Nodo pDestino){
                    if(seEncuentra(L1,pOrigen)){
                        return;
                    }
                    
                    if(pOrigen == pDestino) {System.out.println(L1) ;return;}
                    
                    Arco p = pOrigen.prim;
                      while(p != null)
                      {
                          L1.add(p.pDestino);
                          mostrarCamino(L1,p.pDestino,pDestino);
                          L1.removeLast();
                          p = p.prox;
                      }
                  
                }
                public boolean seEncuentra(LinkedList<Nodo> L1,Nodo p){
                    for(int i = 0; i < L1.size() - 1;i++ )
                        if(L1.get(i) == p){  
                            return true;
                        }
                    return false;
                    
                }
                
                
        //Método que devuelve la cantidad de caminos que existen desde el nodo name1 hasta name2.
        
                public int cantidadCaminos(String name1, String name2){
                    Nodo pOrigen = buscarNodo(name1);
                    Nodo pDestino = buscarNodo(name2);
                    
                    if(pOrigen == null || pDestino == null) return 0;
                    
                    LinkedList<Nodo> L1 = new LinkedList();
                    L1.add(pOrigen);
                    
                    return cantidadCaminos(L1,pOrigen,pDestino);
                    
                }
                
                public int cantidadCaminos(LinkedList<Nodo> L1, Nodo pOrigen, Nodo pDestino){
                    int total = 0;
                    if(seEncuentra(L1,pOrigen)){
                        return 0;
                    }
                    if(pOrigen == pDestino) {
                        return 1;   
                    }
                    
                    Arco p = pOrigen.prim;
        
                      while(p != null)
                      {
                          L1.add(p.pDestino);
                          total = total + cantidadCaminos(L1,p.pDestino,pDestino);
                         
                          L1.removeLast();
                          p = p.prox;
                      }
                  return total;
                }
        
        
        //Método que muestra todos los caminos desde name1 a name2 con su costos totales de recorrido.
        
        
                public void mostrarTotalCamino(String name1, String name2){
                    Nodo pOrigen = buscarNodo(name1);
                    Nodo pDestino = buscarNodo(name2);
                    
                    if(pOrigen == null || pDestino == null) return ;
                    
                    LinkedList<Nodo> L1 = new LinkedList();
                    L1.add(pOrigen);
                    mostrarTotalCamino(L1,pOrigen,pDestino,0);
                    
                }
                
                public void mostrarTotalCamino(LinkedList<Nodo> L1, Nodo pOrigen, Nodo pDestino,int Costo){
                    if(seEncuentra(L1,pOrigen)){
                        return;
                    }
                    if(pOrigen == pDestino) {  
                        System.out.println(L1 +"Costo: "+ Costo) ;
                        return;
                    }
                    Arco p = pOrigen.prim;
                      while(p != null)
                      {
                          L1.add(p.pDestino);
                          mostrarTotalCamino(L1,p.pDestino,pDestino,Costo + p.valor);
                          L1.removeLast();
                          p = p.prox;
                      }
                  
                }
                
          //retorna un booleano si existe camino unico         
               public boolean existeCaminoUnico(String name1, String name2){
                    Nodo pOrigen = buscarNodo(name1);
                    Nodo pDestino = buscarNodo(name2);
                    
                    if(pOrigen == null || pDestino == null) return false;
                    
                    LinkedList<Nodo> L1 = new LinkedList();
                    L1.add(pOrigen);
                    int c = this.cantidadCaminos(name1, name2);
                    return c == 1;
                }
               
                
            //existe camino de A a B ->boolean   
               
                public boolean existeCamino(String name1, String name2){
                    Nodo pOrigen = buscarNodo(name1);
                    Nodo pDestino = buscarNodo(name2);
                    
                    if(pOrigen == null || pDestino == null) return false;
                    
                    LinkedList<Nodo> L1 = new LinkedList();
                    L1.add(pOrigen);
                    return existeCamino(L1,pOrigen,pDestino);
                    
                }
                
                public boolean existeCamino(LinkedList<Nodo> L1, Nodo pOrigen, Nodo pDestino){
                    if(seEncuentra(L1,pOrigen)){
                        return false;
                    }
                    
                    if(pOrigen == pDestino) {return true;}
                    
                    Arco p = pOrigen.prim;
                      while(p != null)
                      {
                          L1.add(p.pDestino);
                          if(existeCamino(L1,p.pDestino,pDestino)){
                              return true;
                          }
                          L1.removeLast();
                          p = p.prox;
                      }
                  return false;
                }
                
                // se puede llegar de un nodo A a un nodo B con un limite de costo -> boolean 
                
                public boolean existeCaminoConCostoX(String name1, String name2, int costoLimite){
                    Nodo pOrigen = buscarNodo(name1);
                    Nodo pDestino = buscarNodo(name2);
                    
                    if(pOrigen == null || pDestino == null) return false;
                    
                    LinkedList<Nodo> L1 = new LinkedList();
                    L1.add(pOrigen);
                    return existeCaminoConCostoX(L1,pOrigen,pDestino,0,costoLimite);
                    
                }
                
                public boolean existeCaminoConCostoX(LinkedList<Nodo> L1, Nodo pOrigen, Nodo pDestino,int costo, int costoLimite){
                    if(seEncuentra(L1,pOrigen)){
                        return false;
                    }
             
                    if(pOrigen == pDestino) {
                       return(costo <= costoLimite);
                       }
                    
                    Arco p = pOrigen.prim;
                      while(p != null)
                      {
                          L1.add(p.pDestino);
                         boolean resultado = existeCaminoConCostoX(L1,p.pDestino,pDestino,costo + p.valor,costoLimite);   
                         if(resultado){
                             return true;
                         }
                         L1.removeLast();
                          p = p.prox;
                      }
                      return false;
                  
                }
        } 
        </code>
        </pre>

</body>
</html>








