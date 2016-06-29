/*Результаты тестирования на совпадение хешей:
 * (Кол-во строк) - длина хеша = Кол-во совпадений
 *
 * (5000) 4 = 300 (6%)
 * (5000) 5 = 6 (0,12%)
 * (10000) 6 = 2 (0,02%)
 * (20000) 7 = 1 (0,005%)
 * (20000) 8 = 0 < 0,005%
 */


#include <iostream>
#include <string>
#include <vector>
#include <cstdlib>
#include <cstring>

using namespace std;

class Hash {
private:
	string hash;

	int receivingExistCodes(int x) {
	    x+=256;
	    while (!(((x <= 57) && (x >= 48)) || ((x <= 90) && (x >= 65)) || ((x <= 122) && (x >= 97)))) {
	        if (x < 48) {x+=24;} else {x-=47;}
	    }
	    return x;
	}

	int getControlSum (string str){
		unsigned int sault = 0, strlen = 0;

		for (; strlen < str.size(); strlen++)
				sault += int (str[strlen]);

		return sault;
	}

public:
	string getHash (string userString, int lengthHash) {
		if (lengthHash > 3)
			{
			//Минимальная длина строки, кратная двум, для хеширования
			unsigned int minLen = 2;
			//Длина строки, ближайшая к нужной длине хеша
			unsigned int realMinLen = 0;

			//Получаем соль оригинальной строки
				unsigned int originalSault = this->getControlSum(userString);
				unsigned int originalLenghtStr = (userString.size());

			//Получение длины строки, кратной степени двух, ближайшей к заданной длине хеша
				while (minLen <= lengthHash)
					realMinLen = (minLen *= 2);

			//Делаем длину строки хеша, как минимум, в 2 раза длинней оригинальной строки
				while (minLen < originalLenghtStr)
					minLen *= 2;
			//Можно сократить написав выше <= ?
				if ((minLen - originalLenghtStr) < minLen)
					minLen *= 2;

			//Получаем кол-во символов, которое необходимо добавить к строке
				int addCount = minLen - originalLenghtStr;

			//Добавление
				for (int i = 0; i < addCount; i++)
					userString += this->receivingExistCodes(userString[i] + userString[i + 1]);

			//Получаем максимальную соль
				int maxSault = this->getControlSum(userString);
				int maxLenghtStr = (userString.size());

			//Определение степени сжатия
				while (userString.size() != realMinLen) //Проблема здесь realMinLen = 8, center = 16
				{
					for (int i = 0, center = userString.size() / 2; i < center; i++)
						this->hash += this->receivingExistCodes(userString[center - i] + userString[center + i]);

					userString = this->hash;
					this->hash.clear();
				}

			//Приведение к нужной длине
				int rem = realMinLen - lengthHash;

				for (int i = 0, countCompress = realMinLen / rem; this->hash.size() < (lengthHash - 4); i++)
				{
					if (i % countCompress == 0)
						this->hash += this->receivingExistCodes(userString[i] + userString[++i]);
					else
						this->hash += userString[i];
				}

			//Добавление оригинальных солей
				this->hash += this->receivingExistCodes(originalSault);
				this->hash += this->receivingExistCodes(originalLenghtStr);

			//Добавление максимальных солей
				this->hash += this->receivingExistCodes(maxSault);
				this->hash += this->receivingExistCodes(maxLenghtStr);

			return this->hash;
			}
		return "";
	}
};

class AutoTests {
private:
	int countInearation;

	//Сравнение строк
	int myStrcmp (string str1, string str2)
	{
	// 0 - Строки равны
	// 1 - str1 > str2
	// -1 - str2 > str1

	//Сравниваем по длинам
		if (str1.length() > str2.length())
			return -1;
		if (str1.length() < str2.length())
			return 1;

	//Сравниваем по символам (если длины равны)
		for (unsigned int i = 0; i < str1.length(); i++)
		{
			if (str1[i] == str2[i]) continue;
			if (i == str1.length() && str1[i] == str2[i])
				return 0;
			if (str1[i] != str2[i])
				return str1[i] < str2[i] ? 1 : -1;
		}
	}

	//Сортировка строк
	void quickSortString(string a[], int l, int r)
	{
		//Центральный элемент
		    string x = a[l + (r - l) / 2];

		    //Первый эл. рассматриваемого массива
		    int i = l;
		    //Последний
		    int j = r;

		    //Обходим весь массив
		    while(i <= j)
		    {
		    	//Определяем новые рамки
		    	//while(strcmp(a[i].c_str(), x.c_str()) < 0) i++;
			  	//while(strcmp(a[j].c_str(), x.c_str()) > 0) j--;
		        while(myStrcmp(a[i], x) > 0) i++;
		        while(myStrcmp(a[j], x) < 0) j--;
		        if(i <= j)
		        {
		            swap(a[i], a[j]);
		            i++;
		            j--;
		        }
		    }

		    //Обход части ближней к концу
		    if (i<r)
		    	quickSortString(a, i, r);

		    //Обход части ближней к началу
		    if (l<j)
		    	quickSortString(a, l, j);
	}

	//Поиск совпадений
	int searchString(string a[], string str, int l, int n)
	{
		int search = -1;

		while (l < n)
		{
			//Центральный элемент
				int x = l + (n - l) / 2;

			//Если нашли
			if (str == a[x]){
				search = x;
				break;
			}

			//Если не нашли
			if (str < a[x])
				n = x - 1;
			else
				l = x + 1;
		}

		return search;
	}

	//Приведение кодов
	int receivingExistCodes(int x) {
		x+=256;
		while (!(((x <= 57) && (x >= 48)) || ((x <= 90) && (x >= 65)) || ((x <= 122) && (x >= 97)))) {
			if (x < 48) {x+=24;} else {x-=47;}
		}
		return x;
	}

	//Генерация строки
	string generationString ()
	{
		string str;
		string chars ="1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNMйцукенгшщзфывапролдячсмитьбюЙЦУКЕНГШЩЗФЫВАПРОЛДЯЧСМИТЬБЮ";
		int lenghtString = rand() % 23 +5;

		for(int i = 0; i < lenghtString; i++)
		{
			str += this->receivingExistCodes(int(chars[rand() % chars.size() +0]));
		}

		return str;
	}
public:
	AutoTests (int countInearation) : countInearation(countInearation)
	{
		srand (time(NULL));
	}

	//Тестирование на совпадение хешей
	void GoTestRandom (int lenghtTemp)
	{
		int counterCoints = 0;

		string stringTemp;
		string resultTemp;

		string arrayHash[this->countInearation];

		//Заполнение
		for (int i = 0; i < this->countInearation; i++)
		{
			stringTemp = this->generationString();

			Hash hash;
			resultTemp = hash.getHash(stringTemp, lenghtTemp);

			arrayHash[i] = resultTemp;
		}

		//Сортируем
		this->quickSortString(arrayHash, 0, this->countInearation-1);

		//Ищем
		for (int i = 0; i < this->countInearation; i++)
		{
			string str = arrayHash[i];
			int x = this->searchString(arrayHash, str, 0, this->countInearation);

			if (i != x && x != -1)
				counterCoints++;
		}

		cout << "Всего совпадений: " << counterCoints << endl;
		arrayHash->clear();
	}
};

int main() {
    /*string str;
    int len;

    cin >> str >> len;

	Hash hash(str,len);*/

	AutoTests test(40000);
	test.GoTestRandom(8);

	 cout << "Time: " << double(clock()) << endl;

    //cout << hash.getHash() << endl;
}
