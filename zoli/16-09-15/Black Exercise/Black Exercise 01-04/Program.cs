using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_01_04
{
    class Program
    {
        static void Main(string[] args)
        {
            double myDouble = 333333.33333;
            //trying to convert the double value to an integer
            int myInt = (int)myDouble;
            //trying to convert the double value to a short
            short myShort = (short)myDouble;
            
            Console.WriteLine(myDouble);
            Console.WriteLine(myInt);
            Console.WriteLine(myShort);

            Console.ReadKey();
        }
    }
}
