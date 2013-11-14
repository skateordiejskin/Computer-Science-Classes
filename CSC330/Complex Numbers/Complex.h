#include <iostream>
#include <cmath>
#include <iomanip>

using namespace std;


class Complex{
	double real;
	double imag;
public:
	Complex(Complex&);
	Complex(double, double);
	double getRealPart();
	double getImagPart();
	void setReal(double);
	void setImag(double);
	
	Complex operator+(Complex);
	Complex operator-(Complex);
	Complex operator*(Complex);
	friend ostream& operator <<(ostream &s,Complex &c);
	//void print(Complex&);
};
