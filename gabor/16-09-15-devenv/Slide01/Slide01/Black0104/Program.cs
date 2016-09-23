using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0104
{
    class Program
    {
        static void Main(string[] args)
        {
            double myDouble = 333333.33333;
            int myInt = (int)myDouble;
            short myShort = (short)myInt;

            Console.WriteLine($"myDouble: {myDouble}");
            Console.WriteLine($"myInt: {myInt}");
            Console.WriteLine($"myShort: {myShort}");

        }
    }
}
