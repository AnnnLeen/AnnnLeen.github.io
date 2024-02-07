# В-2 4. Дана строка, в которой записан путь к файлу. Необходимо найти имя файла без расширения.

def file_name(file_path):
    file1 = file_path.split("/")[-1]
    file1 = file1.split(".")[0]
    return file1

# Пример использования
file_path = input("Введите путь к файлу: ")
result = file_name(file_path)
print(result)
