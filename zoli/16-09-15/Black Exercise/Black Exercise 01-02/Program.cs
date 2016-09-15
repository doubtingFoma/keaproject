using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_01_02
{
    class Program
    {
        static void Main(string[] args)
        {
            float myFloat = 1f * (0.5f - 0.4f - 0.1f );
            double myDouble = 1d * (0.5d - 0.4d - 0.1d);
            decimal myDecimal = 1m * (0.5m - 0.4m - 0.1m);

            //Fast, but sucks (Base 2)
            Console.WriteLine(myFloat);
            Console.WriteLine(myDouble);
           
            //Precise but slow (Base 10)
            Console.WriteLine(myDecimal);

            Console.ReadKey();
        }
    }
}
