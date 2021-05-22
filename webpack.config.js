
/**
 * This file is part of the AlmaviaCX - SFMC-bootstrapper package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    Novactive <dir.tech@novactive.com>
 * @copyright 2021 Almavia CX
 * @license   https://github.com/Novactive/SFMC-bootstrapper/blob/master/LICENSE MIT Licence
 */

const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const path = require('path');

module.exports = {
    entry: {
        app: path.resolve(__dirname, './src/javascript/app.jsx'),
    },
    module: {
        rules: [
            {
                test: /\.(js|jsx)$/,
                exclude: /node_modules/,
                use: ['babel-loader']
            },
            {
                test: /\.s?css$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    {
                        loader: "css-loader",
                        options: {
                            sourceMap: false
                        }
                    },
                    "sass-loader"
                ]
            }
        ],
    },
    resolve: {
        extensions: ['.js', '.jsx']
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: "[name].css"
        }),
    ],
    output: {
        path: path.resolve(__dirname, './build')
    }
};
