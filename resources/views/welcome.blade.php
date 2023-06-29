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
    
                public int elem;
                public int frec;
                public Nodo izq;
                public Nodo der;
            
                public Nodo(int elemento) {
                    this.izq = this.der = null;
                    this.frec = 1;
                    this.elem = elemento;
                }
                
            }//--fin Nodo

//-------------------------------------------------------
public class Arbol {

    public Nodo raiz;

    public Arbol() {
        raiz = null;
    }

    public void insertar(int x) {
        raiz = insertar(raiz, x);
    }

    private Nodo insertar(Nodo p, int x) {
        if (p == null) {
            return new Nodo(x);
        }
        if (p.elem == x) {
            p.frec++;
        } else {
            if (x < p.elem) {
                p.izq = insertar(p.izq, x);
            } else {
                p.der = insertar(p.der, x);
            }
        }
        return p;
    }

    public void MenorAMayorConFrecuencia() {
        MenorAMayorConFrecuencia(raiz);
    }

    private void MenorAMayorConFrecuencia(Nodo p) {
        if (p == null) {
            return;
        }
        MenorAMayorConFrecuencia(p.izq);
        System.out.println("Elemento: " + p.elem + " Frecuencia: " + p.frec);
        MenorAMayorConFrecuencia(p.der);
    }

    public void mostrarElementosDeFrecuenciaX(int x) {
        mostrarElementosDeFrecuenciaX(raiz, x);
    }

    private void mostrarElementosDeFrecuenciaX(Nodo p, int x) {
        if (p == null) {
            return;
        }

        if (p.frec == x) {
            System.out.println(p.elem);
        }
        mostrarElementosDeFrecuenciaX(p.izq, x);
        mostrarElementosDeFrecuenciaX(p.der, x);

    }

    public void mostrarElementosEntreAyB(int A, int B) {
        mostrarElementosEntreAyB(raiz, A, B);
    }

    private void mostrarElementosEntreAyB(Nodo p, int A, int B) {
        if (p == null) {
            return;
        }

        if (p.frec >= A && p.frec <= B) {
            System.out.println(p.elem);
        }
        mostrarElementosEntreAyB(p.izq, A, B);
        mostrarElementosEntreAyB(p.der, A, B);

    }

    public int menorF() {
        return menorF(raiz, raiz.frec); //2
    }

    private int menorF(Nodo p, int minFrecuencia) {
        if (p == null) {
            return minFrecuencia;
        }

        if (p.frec < minFrecuencia) {
            minFrecuencia = p.frec;
        }

        int minI = menorF(p.izq, minFrecuencia);
        int minD = menorF(p.der, minFrecuencia);

        if (minI < minD) {
            return minI;
        } else {
            return minD;
        }
    }

    public int obtenerFrecuenciaElemento(int elemento) {
        return obtenerFrecuenciaElemento(raiz, elemento);
    }

    private int obtenerFrecuenciaElemento(Nodo nodo, int elemento) {
        if (nodo == null) {
            return 0;
        }
        if (nodo.elem == elemento) {
            return nodo.frec;
        }
        int frecuenciaIzq = obtenerFrecuenciaElemento(nodo.izq, elemento);
        int frecuenciaDer = obtenerFrecuenciaElemento(nodo.der, elemento);
        return frecuenciaIzq + frecuenciaDer;
    }

    public boolean existeFrecuencia(int x) {
        return existeFrecuencia(raiz, x);
    }

    private boolean existeFrecuencia(Nodo p, int x) {
        if (p == null) {
            return false;
        }
        if (p.frec == x) {
            return true;
        }
        return existeFrecuencia(p.izq, x) || existeFrecuencia(p.der, x);
    }

    public int cantidad() {
        return cantidad(raiz);
    }

    private int cantidad(Nodo p) {
        if (p == null) {
            return 0;
        }
        return cantidad(p.izq) + cantidad(p.der) + p.frec;
    }

}//-------------------------------------------fin codigo 


//-------------------ELIMINAR------------------------------------
public void eliminar(int x) {
    raiz = eliminar(raiz, x);
}

private Nodo eliminar(Nodo p, int x) {
    if (p == null) {
        return null;
    }
    if (p.elem == x) {
        return eliminarNodo(p);
    }
    if (x < p.elem) {
        p.izq = eliminar(p.izq, x);
    } else {
        p.der = eliminar(p.der, x);
    }
    return p;
}

private Nodo eliminarNodo(Nodo p) {
    if (p.izq == null && p.der == null) {
        return null;
    }

    if (p.izq != null && p.der == null) {
        return p.izq;
    }

    if (p.izq == null && p.der != null) {
        return p.der;
    }

    int y = InmediatoInf(p.izq);
    p.elem = y;
    p.izq = eliminar(p.izq, y);
    return p;

}

private int InmediatoInf(Nodo p) {
    if (p.der == null) {
        return p.elem;
    } else {
        return InmediatoInf(p.der);
    }

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
              
           
          
            
        </code>
        </pre>

</body>
</html>








