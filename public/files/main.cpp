#include <iostream>
#include <vector>
#include <algorithm>
using namespace std;

//prototypes
void askNumber();
void returnElement(int _number,vector<int>& _table);
void checkVector(vector<int> _table); 
struct myclass {           // function object type:
	  void operator() (int i) {std::cout << ' ' << i;}
} myObject;

//program

int main(){
	int numb;
	vector<int> tableau;
	do{
	askNumber();
	cin >> numb;
	returnElement(numb, tableau);
	checkVector(tableau);
	}while(tableau.size() < 4);
	return 0;
}

//functions

void askNumber(){
	cout << "Veuillez entrez un nombre" << endl;
	cout << "[nombre positif] -> stockage de la valeur" << endl;
	cout << "[nombre negatif] -> suppression de la dernière valeur entrée" << endl;
	cout << "[nombre nul] -> suppression de l'ensemble de valeurs" << endl;
	cout << "La saisie de trois valeurs positives engendre leur affichage" << endl;
}

void returnElement(int _number,vector<int>& _table){
	if(_number == 0){
		if (not(_table.empty())){
			_table.clear();
		}
	}else if(_number >= 0){
		_table.push_back(_number);
	}else if(_number < 0){
		_table.pop_back();
	}
}

void checkVector(vector<int> _table){
	size_t tabSize(_table.size());
	cout << tabSize;
	if(tabSize > 3){
		for_each(_table.begin(),_table.end(), myObject);
	}
}
