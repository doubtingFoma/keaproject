using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0105
{
    class Program
    {
        enum Months { January = 1, February, March, April, May, June, July, August, September, October, November, December };

        static void Main(string[] args)
        {
            Months june = Months.June;
            int juneNumber = (int)june;
            Console.WriteLine($"{june} is the {juneNumber}. month of the year.");
        }
    }
}
