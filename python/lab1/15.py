# В-2 15. Дан целочисленный массив. Необходимо найти индекс минимального элемента.

def minimum(arr):
    min = arr[0]  
    min_index = 0 
    for i in range(1, len(arr)):
        if arr[i] < min:
            min = arr[i]
            min_index = i
    return min_index

arr = input("Введите целочисленный массив через пробел: ")
arr = arr.split()
arr = [int(num) for num in arr]
result = minimum(arr)
print(result)
