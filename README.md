# DailyCode


## Enoncé
[Echo](https://www.instagram.com/globalisecho/?hl=fr), mascotte de l'équipe de [Globalis](https://www.globalis-ms.com/), a découvert une fonction `foo()` bien mystérieuse. Hélas, il n'a pas accès au code. Curieux et grand amateur de [rétro-ingénierie](https://fr.wikipedia.org/wiki/R%C3%A9tro-ing%C3%A9nierie), Echo s'est amusé à appeler cette fonction, en injectant des données en entrée et en récoltant les sorties. Le comportement de la fonction `foo()` est le suivant :

|  Appel     |  Sortie     |
| ---   |:-:    |
| `foo([[0, 3], [6, 10]])` | `[[0, 3], [6, 10]]` |
| `foo([[0, 5], [3, 10]])` | `[[0, 10]]` |
| `foo([[0, 5], [2, 4]])` | `[[0, 5]]` |
| `foo([[7, 8], [3, 6], [2, 4]])` | `[[2, 6], [7, 8]]` |
| `foo([[3, 6], [3, 4], [15, 20], [16, 17], [1, 4], [6, 10], [3, 6]])` | `[[1, 10], [15, 20]]` |

La fonction calcule l'ensemble d'intervalle disjoint qu'on peut obtenir à partir des données en entrée

Exemple de calcul à partir de la données en entrée: [[3, 6], [3, 4], [15, 20], [16, 17], [1, 4], [6, 10], [3, 6]])` | `[[1, 10], [15, 20]]

        [[1, 4]        [3, 6] [3, 6] [6, 10] [16, 17] [15, 20]]

        [[1, 6]               [3, 6] [6, 10] [16, 17] [15, 20]]

        [[1, 6]                      [6, 10] [16, 17] [15, 20]]

        [[1, 10]                             [16, 17] [15, 20]]

        [[1, 10] [16, 17]                             [15, 20]]
        [[1, 10] [15, 20]                                     ]

    
    
    => Les étapes de calculs
    
    1- Trier par ordre croissante en fonction de la somme de chaque élément:
    [1, 4], [3, 4], [3, 6], [3, 6], [6, 10], [16, 17], [15, 20]

    En partant du premier élement, 

    2- On calcule l'intervalle disjoint entre [1, 4] et [3,4]
        Resultat
        [1, 4]
        Données
        [1, 4]        [3, 6] [3, 6] [6, 10] [16, 17] [15, 20]

    3- On clacule l'intervalle disjoint entre [1, 4] et [3, 6]
        Resultat
        [1, 6]         
        Données
        [1, 6]               [3, 6] [6, 10] [16, 17] [15, 20]

    4- On clacule l'intervalle disjoint entre [1, 6] et [3, 6]
        Resultat
        [1, 6]
        Données
        [1, 6]                      [6, 10] [16, 17] [15, 20]

    5- On clacule l'intervalle disjoint entre [1, 6] et [6, 10]
        Resultat
        [1, 10]
        Données
        [1, 10]                             [16, 17] [15, 20]

    6- On clacule l'intervalle disjoint entre [1, 10] et [16, 17]
        Resultat
        [1, 10] [16, 17]
        Données
        [1, 10][16, 17]                                 [15, 20]
    
    7- On clacule l'intervalle disjoint entre [16, 17] et [15, 20]
        Resultat
        [15, 20]
        Données
        [1, 10][15, 20]

    => Resultat final [1, 10][15, 20]
    
