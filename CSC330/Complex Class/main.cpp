#include"complex.h"

int main()
{
	complex<double> c = complex<double>(4.5, 2);
	complex<double> b = complex<double>(3, 4);
	complex<double> a = complex<double>(0, 0);
	complex<double> d = complex<double>(0, 0);

	cout << "C : ";
	c.PrintData(c);
	cout << "B : ";
	b.PrintData(b);
	a = b + c;
	cout << "B + C : ";
	a.PrintData(a);

	cout << "C * B : ";
	d = c * b;
	d.PrintData(d);
	cin.get();
	return 0;
}