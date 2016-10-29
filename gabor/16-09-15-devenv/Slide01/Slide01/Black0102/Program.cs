using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0102
{
    class Program
    {
        static void Main(string[] args)
        {
            float number1 = 1f * (0.5f - 0.4f - 0.1f);
            double number2 = 1d * (0.5d - 0.4d - 0.1d);
            decimal number3 = 1m * (0.5m - 0.4m - 0.1m);

            Console.WriteLine(number1);
            Console.WriteLine(number2);
            Console.WriteLine(number3);
        }
    }
}
