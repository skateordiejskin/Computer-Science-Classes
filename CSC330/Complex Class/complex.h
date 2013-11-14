#include<iostream>

using namespace std;

template <class T>
class complex
{
private:
	T realNumber;
	T imaginaryNum;
	char letter;

public:
	complex();
	complex(T real, T imag) : realNumber(real), imaginaryNum(imag), letter('i') {}
	complex operator+(complex &other);
	complex operator-(complex &other);
	complex operator*(complex &other);

	T getRealPart();
	T getImagPart();
	T setReal(T val);
	T setImag(T val);

	T PrintData(complex&);
};

template <class T>
complex<T>::complex()
{
	realNumber = 0.0;
	imaginaryNum = 0.0;
	letter = 'i';
}

template <class T>
T complex<T>::getImagPart()
{
	return imaginaryNum;
}

template <class T>
T complex<T>::getRealPart()
{
	return realNumber;
}

template <class T>
T complex<T>::setImag(T val)
{
	return imaginaryNum = val;
}

template <class T>
T complex<T>::setReal(T val)
{
	return realNumber = val;
}

template<class T>
complex<T> complex<T>::operator+(complex<T> &other)
{
	return complex( realNumber + other.realNumber, imaginaryNum + other.imaginaryNum);
}

template<class T>
complex<T> complex<T>::operator-(complex<T> &other)
{
	return complex( realNumber - other.realNumber, imaginaryNum - other.imaginaryNum);
}

template<class T>
complex<T> complex<T>::operator*(complex<T> &other)
{
	return complex((realNumber * other.realNumber) - imaginaryNum * other.imaginaryNum, realNumber * other.imaginaryNum + imaginaryNum * other.realNumber);
}

template<class T>
T complex<T>::PrintData(complex<T>& c1)
{
	cout << c1.getRealPart() << " , " << c1.getImagPart() << c1.letter << endl;
	return 0;
}

