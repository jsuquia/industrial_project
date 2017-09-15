print('upload run')

from xlrd import open_workbook
wb = open_workbook('sample.xlsx')
for s in wb.sheets():
    print ('Sheet:',s.name)
    values = []
    for row in range(s.nrows):
        col_value = []
        for col in range(s.ncols):
            value = s.cell(row,col).value
            try : value = str(float(value))
            except : pass
            col_value.append(value)
        values.append(col_value)
print(values)
#
# from xlrd import open_workbook
#
# class Arm(object):
#     def __init__(self, id, dsp_name, dsp_code, hub_code, pin_code, pptl):
#         self.id = id
#         self.dsp_name = dsp_name
#         self.dsp_code = dsp_code
#         self.hub_code = hub_code
#         self.pin_code = pin_code
#         self.pptl = pptl
#
#     def __str__(self):
#         return("Arm object:\n"
#                "  Arm_id = {0}\n"
#                "  DSPName = {1}\n"
#                "  DSPCode = {2}\n"
#                "  HubCode = {3}\n"
#                "  PinCode = {4} \n"
#                "  PPTL = {5}"
#                .format(self.id, self.dsp_name, self.dsp_code,
#                        self.hub_code, self.pin_code, self.pptl))
#
# wb = open_workbook('sample.xlsx')
# for sheet in wb.sheets():
#     number_of_rows = sheet.nrows
#     number_of_columns = sheet.ncols
#
#     items = []
#
#     rows = []
#     for row in range(1, number_of_rows):
#         values = []
#         for col in range(number_of_columns):
#             value  = (sheet.cell(row,col).value)
#             try:
#                 value = str(int(value))
#             except ValueError:
#                 pass
#             finally:
#                 values.append(value)
#         item = Arm(*values)
#         items.append(item)
#
# for item in items:
#     print(item)
#     print("Accessing one single value (eg. DSPName): {0}".format(item.dsp_name))
#     print