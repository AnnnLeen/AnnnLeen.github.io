import re

def combinations(string):
    gl = 'aeiouy'
    sogl = 'bcdfghjklmnpqrstvwxz'
    count_gl_sogl = len(re.findall('(?=('+'|'.join(gl)+')('+ '|'.join(sogl)+'))', string))
    count_sogl_gl = len(re.findall('(?=('+'|'.join(sogl)+')('+ '|'.join(gl)+'))', string))
    return abs(count_gl_sogl - count_sogl_gl)

strings = input("Введите список строк (через точку): ").split(". ")
strings = sorted(strings, key=combinations)

for i in strings:
    print(i)
