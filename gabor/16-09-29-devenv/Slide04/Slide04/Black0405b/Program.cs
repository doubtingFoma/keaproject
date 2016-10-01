using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0405b
{
    class Program
    {
        static void Main(string[] args)
        {
            int[] myArray = { 2, 6, 7, 5, 3, 9};
            int minNumber = GetEdge(myArray, "min");
            int maxNumber = GetEdge(myArray, "max");

            Console.WriteLine($"This is the smallest number: {minNumber}");
            Console.WriteLine($"This is the biggest number: {maxNumber}");
        }

        static int GetEdge(int[] myArray, string find)
        {
            int edge = myArray[0];

            for (int i = 0; i < myArray.Length; i++)
            {
                if (find == "max")
                {
                    edge = edge < myArray[i] ? myArray[i] : edge;
                } else if (find == "min")
                {
                    edge = edge > myArray[i] ? myArray[i] : edge;
                }
            }

            return edge;
        }
    }
}
