#include <iostream>
#include <string>
#include <vector>
#include <cstdlib>

using namespace std;

class Hash {
	string hash;

	int receivingExistCodes(int x) {
		x += 256;
		while (!(((x <= 57) && (x >= 48)) || ((x <= 90) && (x >= 65)) || ((x <= 122) && (x >= 97)))) {
			if (x < 48) { x += 24; }
			else { x -= 47; }
		}
		return x;
	}

	int getControlSum(string str) {
		unsigned int sault = 0, strlen = 0;

		for (; strlen < str.size(); strlen++)
			sault += int(str[strlen]);

		return sault;
	}

public:
	string getHash(string userString, unsigned int lengthHash) {
		if (lengthHash > 3)
		{
			//Минимальная длина строки хеша, кратная двум
			unsigned int minLen = 2;
			//Длина строки, ближайшая к нужной длине хеша
			unsigned int realMinLen = 0;

			//Получаем соль оригинальной строки
			unsigned int originalSault = this->getControlSum(userString);
			unsigned int originalLenghtStr = (userString.size());

			//Получение длины строки, кратной степени двух, ближайшей к заданной длине хеша
			while (minLen <= lengthHash)
				realMinLen = (minLen *= 2);

			//Получаем ближайшее к длине исходной строки число такого типа - 2^n
			while (minLen < originalLenghtStr)
				minLen *= 2;

			//Делаем длину строки хеша, как минимум, в 2 раза длинней оригинальной строки
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
			while (userString.size() != realMinLen)
			{
				for (int i = 0, center = userString.size() / 2; i < center; i++)
					this->hash += this->receivingExistCodes(userString[center - i] + userString[center + i]);

				userString = this->hash;
				this->hash.clear();
			}

			//Приведение к нужной длине
			unsigned int rem = realMinLen - lengthHash;

			for (unsigned int i = 0, countCompress = realMinLen / rem; this->hash.size() < (lengthHash - 4); i++)
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

int main() {
	Hash hash;

    string str;
    int len;

    cin >> str >> len;

    cout << hash.getHash(str,len) << endl;
}
