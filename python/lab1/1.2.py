# В-2 1.2. Найти сумму цифр числа, делящихся на 3

n = int(input("Введите число: "))

def summa(n):
    sum = 0
    while n > 0:
        cifra = n % 10
        if (cifra % 3) == 0:
            sum = sum + cifra
        n = n // 10
    return sum

result = summa(n)
print(result)



