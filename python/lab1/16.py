# В-2 16. Дан целочисленный массив и интервал a..b. Необходимо найти количество элементов в этом интервале.

def interval(a, b, arr):
    k=0
    for i in range(0, len(arr)):
        if arr[i]>a and arr[i]<b:
            k+=1
    return k

arr = input("Введите целочисленный массив через пробел: ")
arr = arr.split()
arr = [int(num) for num in arr]
a = int(input("Введите a: "))
b = int(input("Введите b: "))
result = interval(a, b, arr)
print(result)
