import math as m

class Quad:
    # идентификатор, координаты левого верхнего угла и сторона
    def __init__(self, identif, a, x, y):
        self.identif = identif
        self.a = a
        self.x = x
        self.y = y

    def set_x(self, x):
        self.x = x
        if not isinstance(x, (int, float)):
            raise Exception("Введенные данные не являются числом")

    def set_y(self, y):
        self.y = y
        if not isinstance(y, (int, float)):
            raise Exception("Введенные данные не являются числом")

    def set_a(self, a):
        self.a = a
        if a < 0:
            raise Exception("Длина стороны меньше нуля")
        if not isinstance(a, (int, float)):
            raise Exception("Введенные данные не являются числом")

    def move(self, dx, dy):
        self.x += dx
        self.y += dy

    def coord(self):
        quad_coord = [(self.x, self.y), (self.x + self.a, self.y), (self.x + self.a, self.y - self.a), (self.x, self.y - self.a)]
        return quad_coord

    def to_string(self):
        print("Квадрат", self.identif, "с координатами x =", self.x, "y =", self.y, "и стороной равной", self.a)


class Pentagon:
    def __init__(self, identif, a, x, y):
        self.identif = identif
        self.a = a
        self.x = x
        self.y = y

    def set_x(self, x):
        self.x = x
        if not isinstance(x, (int, float)):
            raise Exception("Введенные данные не являются числом")

    def set_y(self, y):
        self.y = y
        if not isinstance(y, (int, float)):
            raise Exception("Введенные данные не являются числом")
    def set_a(self, a):
        self.a = a
        if a < 0:
            raise Exception("Длина стороны меньше нуля")
        if not isinstance(a, (int, float)):
            raise Exception("Введенные данные не являются числом")

    def move(self, dx, dy):
        self.x += dx
        self.y += dy

    def coord(self):
        pentagonCoord = [(self.x, self.y), (self.x + self.a, self.y), (self.x + self.a * m.cos(2*m.pi/5), self.y - self.a * m.sin(2*m.pi/5)), (self.x + self.a * m.cos(m.pi/5), self.y - self.a * m.sin(m.pi/5)), (self.x - self.a * m.cos(m.pi/5), self.y - self.a * m.sin(m.pi/5))]
        return pentagonCoord

    def to_string(self):
        print("Пятиугольник", self.identif, "с координатами x =", self.x, "y =", self.y, "и стороной равной", self.a)


def is_intersect(quad, pentagon):
    c1 = quad.coord()
    c2 = pentagon.coord()
    for point in c1:
        if point[0] >= pentagon.x and point[0] <= pentagon.x + pentagon.a and point[1] >= pentagon.y and point[1] <= pentagon.y + pentagon.a:
            return True
    for point in c2:
        if point[0] >= quad.x and point[0] <= quad.x + quad.a and point[1] >= quad.y and point[1] <= quad.y + quad.a:
            return True
    return False


quad = Quad("001", 2, 4, 6)
pentagon = Pentagon("002",1, -2, 1)
quad.to_string()
pentagon.to_string()
print("Пересекаются ли фигуры: ", is_intersect(quad, pentagon))

quad.set_x(2)
quad.set_y(2)
quad.set_a(4)
pentagon.set_x(4)
pentagon.set_y(4)
pentagon.set_a(4)
quad.to_string()
pentagon.to_string()
print("Пересекаются ли фигуры: ", is_intersect(quad, pentagon))

quad.move(-2, 0)
pentagon.move(-2, 1)
quad.to_string()
pentagon.to_string()

quad.set_x("абв")
