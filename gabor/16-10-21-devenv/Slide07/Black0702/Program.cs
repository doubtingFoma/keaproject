using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0702
{
    class Program
    {
        static void Main(string[] args)
        {
            Triangle myTriangle01 = new Triangle(10, 50);
            Triangle myTriangle02 = new Triangle(15, 60);

            Rectangle myRectangle01 = new Rectangle(50, 20);
            Rectangle myRectangle02 = new Rectangle(60, 50);

            Circle myCircle01 = new Circle(50);

            List<Shape> listOfShapes = new List<Shape>();

            listOfShapes.Add(myTriangle01);
            listOfShapes.Add(myTriangle02);
            listOfShapes.Add(myRectangle01);
            listOfShapes.Add(myRectangle02);
            listOfShapes.Add(myCircle01);

            DrawShapes(listOfShapes);
        }

        static void DrawShapes(List<Shape> listOfShapes)
        {
            for (int i = 0; i < listOfShapes.Count; i++)
            {
                listOfShapes[i].Draw();
            }
        }
    }
}
